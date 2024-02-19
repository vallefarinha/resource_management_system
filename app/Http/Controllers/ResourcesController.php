<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Tag;
use App\Models\Type;

use App\Models\Resource;
use App\Models\Extra;
use App\DataTables\CollectionDataTable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ResourcesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function add()
    {
        $users = User::all();
        $tags = Tag::all();
        $types = Type::all();
        return view('add', compact('users', 'tags', 'types'));
    }

    public function collection()
    {
        $collection = Resource::with('tag', 'type', 'user')->get();
        return view('collection', ['collections' => $collection]);
    }

    public function resource(Resource $resource)
    {
        if (!$resource) {
            return redirect()->route('collection')->with('error', 'This file was not found!');
        }
        $resource->load('extra');
        return view('resource', ['resource' => $resource]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'id_type' => 'required|integer',
            'id_tag' => 'required|integer',
            'id_user' => 'required|integer',
        ]);

        $resource = new Resource();
        $resource->title = $validatedData['title'];
        $resource->id_type = $validatedData['id_type'];
        $resource->id_tag = $validatedData['id_tag'];
        $resource->id_user = $validatedData['id_user'];

        if ($request->input('select-type') === 'link') {
            $resource->link = $request->input('link');
        } else {
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('uploads');
                $resource->link = $filePath;
            } else {
                return redirect()->route('add')->with('error', 'Please select a file')->withErrors($resource->errors());
            }
        }

        if ($resource->save()) {
            return redirect()->route('collection')->with('success', 'Your resource was added successfully');
        } else {
            return redirect()->route('add')->with('error', 'Oops! Try again!')->withErrors($resource->errors());
        }
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        $users = User::all();
        $tags = Tag::all();
        $types = Type::all();
        return view('edit', compact('resource', 'users', 'tags', 'types'));
    }

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

    public function download($id)
    {
        $resource = Resource::findOrFail($id);

        if (!$resource->isFile()) {
            return redirect()->away($resource->link);
        }

        $filePath = $resource->getFilePath($resource->link);

        if (Storage::exists($filePath)) {
            return Storage::download($filePath, $resource->title);
        } else {
            return back()->with('error', 'File not found');
        }
    }


   public function delete($id)
    {
        $resource = Resource::find($id);
        if (!$resource) {
            return redirect()->route('resource.delete')->with('error', 'This file is not found!');
        }
        $resource -> delete();
            return redirect()->route('collection')->with('success', 'Resource deleted successfully');
    }

    public function deleteExtra($extra)
    {
        try {
            $resource = Extra::findOrFail($extra);
            $resource->delete();
            return redirect()->back()->with('success', 'Extra deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Try again!');
        }
    }


   
    public function storeExtra(Request $request)
    {
        $validatedData = $request->validate([
            'extra_name' => 'required|string|max:255',
            'extra_link' => ['required', 'regex:/^(http:\/\/|https:\/\/|www\.)\S+$/'],
            'id_tag' => 'required|exists:tags,id', 
            'id_resource' => 'required|exists:resources,id', 
        ]);
      
        if (in_array(null, $validatedData, true)) {
            return redirect()->route('resource.extra')->with('error', 'Please add extra link');
        }
    
        $extra = new Extra();
        $extra->extra_name = $request->input('extra_name');
        $extra->extra_link = $request->input('extra_link');
        $extra->id_tag = $request->input('id_tag'); 
        $extra->id_resource = $request->input('id_resource'); 
        $extra->created_at = now();
        $extra->updated_at = now();
    
        if ($extra->save()) {
            return redirect()->back()->with('success', 'Extra added successfully!');
        } else {
            return redirect()->back()->with('error', 'Oops! Try again!')->withErrors($extra->errors()->all());
        }
    }

}