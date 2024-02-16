<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

=======
>>>>>>> 2b58adad0e7660c6672b278ae15dadd8752f75fe
use App\Models\User;
use App\Models\Tag;
use App\Models\Type;
use App\Models\Resource;

class ResourcesController extends Controller
{
    // Show the home view
    public function home()
    {
        return view('home');
    }

    // Show the form for adding a new resource
    public function add()
    {
        $users = User::all();
        $tags = Tag::all();
        $types = Type::all();
        return view('add', compact('users', 'tags', 'types'));
    }

    // Show the collection of resources
    public function collection()
    {
        $collection = Resource::with('tag', 'type', 'user')->get();
        return view('collection', ['collections' => $collection]);
    }


    // Show a single resource
    public function resource(Resource $resource)
    {
        if (!$resource) {
            return redirect()->route('collection')->with('error', 'This file was not found!');
        }
        return view('resource', ['resource' => $resource]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'id_type' => 'required|integer',
            'id_tag' => 'required|integer',
            'id_user' => 'required|integer',
            'link' => 'required|file',
        ]);

        if (in_array(null, $validatedData, true)) {
            return redirect()->route('add')->with('error', 'Please fill in all fields.');
        }

        $filePath = $request->file('link')->store('uploads');

        $resource = new Resource();
        $resource->title = $validatedData['title'];
        $resource->id_type = $validatedData['id_type'];
        $resource->id_tag = $validatedData['id_tag'];
        $resource->id_user = $validatedData['id_user'];
        $resource->link = $filePath;

        if ($resource->save()) {
            return redirect()->route('store.resource')->with('success', 'Your file was sent');
        } else {
            return redirect()->route('store.resource')->with('error', 'Oops! Try again!')->withErrors($resource->errors());
        }
    }


    // Show the form for editing a resource
    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        $users = User::all();
        $tags = Tag::all();
        $types = Type::all();
        return view('edit', compact('resource', 'users', 'tags', 'types'));
    }

    // Update an existing resource
    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);
        $originalData = $resource->toArray();
        $resource->update($request->all());
        $updatedData = $resource->toArray();

        if ($originalData === $updatedData) {
            return redirect()->route('resource.resource', ['resource' => $resource])->with('warning', 'No changes were made.');
        } else {
            return redirect()->route('resource.resource', ['resource' => $resource])->with('success', 'Your resource has successfully updated!');
        }
    }



  public function download(Resource $resource)
    {
        if (!$resource) {
            return back()->with('error', 'File not found.');
        }

        // Obtém o caminho completo do arquivo
        $filePath = storage_path('app/public/' . $resource->link);

        // Verifica se o arquivo existe no servidor
        if (!file_exists($filePath)) {
            return back()->with('error', 'File not found on server.');
        }

        // Define o nome do arquivo para download
        $fileName = $resource->title . '.' . pathinfo($resource->link, PATHINFO_EXTENSION);

        // Adiciona um log para verificar o caminho e o nome do arquivo
        Log::info('File Path: ' . $filePath);
        Log::info('File Name: ' . $fileName);

        // Tenta baixar o arquivo usando o método Storage::download()
        try {
            return Storage::download($filePath, $fileName);
        } catch (\Exception $e) {
            // Se houver uma exceção, registramos no log e retornamos uma resposta de erro
            Log::error('Error downloading file: ' . $e->getMessage());
            return back()->with('error', 'Error downloading file.');
        }
    }


    public function delete($id)
    {
        $resource = Resource::find($id);
        if (!$resource) {
            return redirect()->route('resource.delete')->with('error', 'This file is not found!');
        }
        $resource->delete();
        return redirect()->route('collection')->with('success', 'File deleted successfully!');
    }

}