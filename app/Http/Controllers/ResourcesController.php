<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return redirect()->route('store_resource')->with('success', 'Your file was sent');
        } else {
            return redirect()->route('store_resource')->with('error', 'Oops! Try again!')->withErrors($resource->errors());
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
        return response()->download(storage_path('uploads/' . basename($resource->link)));
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

