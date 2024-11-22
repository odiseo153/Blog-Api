<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    // Define any routes that require authentication here
});

Route::post('/login', [AuthController::class, 'login']);


Route::middleware( 'auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});



