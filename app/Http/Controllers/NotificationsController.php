<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use App\Http\Requests\StorenotificationsRequest;
use App\Http\Requests\UpdatenotificationsRequest;

class NotificationsController extends ApiController
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
    public function store(StorenotificationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenotificationsRequest $request, notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notifications $notifications)
    {
        //
    }
}
