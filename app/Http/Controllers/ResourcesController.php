<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    //home
    public function home (){
        return View ('home');
     }

      //add
    public function add (){
        return View ('add');
     }

      //collection
    public function collection (){
        return View ('collection');
     }

      //resource
    public function resource (){
        return View ('resource');
     }

    /*** Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
    public function delete(string $id)
    {
        //
    }
}
