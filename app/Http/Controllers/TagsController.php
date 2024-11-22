<?php

namespace App\Http\Controllers;

use App\Models\tags;
use App\Http\Requests\StoretagsRequest;
use App\Http\Requests\UpdatetagsRequest;

class TagsController extends ApiController
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
    public function store(StoretagsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetagsRequest $request, tags $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tags $tags)
    {
        //
    }
}
