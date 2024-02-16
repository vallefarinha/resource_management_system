<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Tag;
use App\Models\Type;
use App\Models\Resource;
use App\DataTables\CollectionDataTable;

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
           return view('collection', ['collections'=>$collection]);
    }

    // public function datatable(CollectionDataTable $dataTable){
    //     return $dataTable->render('collection');
    //     }

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
            return redirect()->route('add')->with('error', 'Por favor, preencha todos os campos.');
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


    // public function index()
    // {
    //     // Teste para verificar se os dados estão sendo recuperados corretamente
    //     $tags = Tag::all();
    //     dd($tags); // Isso irá imprimir os dados recuperados na tela para verificar

    //     // Se os dados estão sendo exibidos corretamente, passe-os para a vista
    //     return view('add', compact('tags'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $resource = Resource::find($id);

        if (!$resource) {
            return redirect()->route('resource.delete')->with('error', 'This file is not found!');
        }
        $resource -> delete();
            return redirect()->route('collection')->with('success', 'File deleted successfully!');

    }

}