<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Tag;
use App\Models\Type;
use App\Models\Resource;

class ResourcesController extends Controller
{
    //home
    public function home()
    {
        return view('home');
    }

    //add
    public function add()
    {
        $users = User::all();
        $tags = Tag::all();
        $types = Type::all();
        return view('add', compact('users', 'tags', 'types'));
    }

    //collection
    public function collection()
    {
        $collection = Resource::with('tag', 'type', 'user')->get();
        return view('collection', ['collections' => $collection]);
    }

    //resource
    public function resource(Resource $resource)
    {

        if (!$resource) {
            return redirect()->route('collection')->with('error', 'Este arquivo não foi encontrado!');
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
            return redirect()->route('add')->with('error', 'All fields are required');
        }
        $filePath = $request->file('link')->store('uploads', 'public');

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