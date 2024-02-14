<?php

namespace App\Http\Controllers;

use App\Models\Resources;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResourcesRequest;
use App\Http\Requests\UpdateResourcesRequest;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourcesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Resources $resources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resources $resources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourcesRequest $request, Resources $resources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resources $resources)
    {
        //
    }
}
