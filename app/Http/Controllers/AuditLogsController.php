<?php

namespace App\Http\Controllers;

use App\Models\audit_logs;
use App\Http\Requests\Storeaudit_logsRequest;
use App\Http\Requests\Updateaudit_logsRequest;

class AuditLogsController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeaudit_logsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(audit_logs $audit_logs)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Updateaudit_logsRequest $request, audit_logs $audit_logs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(audit_logs $audit_logs)
    {
        //
    }
}
