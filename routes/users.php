<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\User\Adapters\Controllers\UserController;

Route::middleware('auth')->group(function () {
    // Define any routes that require authentication here
});



Route::apiResource( '/users', UserController::class);

Route::middleware('auth:sanctum')->group(function () {
});



