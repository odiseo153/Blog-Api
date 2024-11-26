<?php

use App\Post\Adapters\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::post('/posts/tag', [PostController::class, 'addTagToPost']);
});





