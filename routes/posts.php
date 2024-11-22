<?php

use App\Post\Adapters\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {
    Route::patch('posts/add-tag', [PostController::class, 'addTagToPost']);
    Route::apiResource('posts', PostController::class);
});





