<?php

namespace App\Http\Controllers;

use App\Models\likes;
use App\Http\Requests\StorelikesRequest;
use App\Http\Requests\UpdatelikesRequest;

class LikesController extends ApiController
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
    public function store(StorelikesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelikesRequest $request, likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(likes $likes)
    {
        //
    }
}
