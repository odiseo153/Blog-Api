<?php

namespace App\Http\Controllers;

use App\Models\post_tag;
use App\Http\Requests\Storepost_tagRequest;
use App\Http\Requests\Updatepost_tagRequest;

class PostTagController extends ApiController
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
    public function store(Storepost_tagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post_tag $post_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post_tag $post_tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatepost_tagRequest $request, post_tag $post_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post_tag $post_tag)
    {
        //
    }
}
