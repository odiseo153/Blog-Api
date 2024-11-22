<?php

use App\Comment\Adapters\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    
    Route::apiResource( '/comments', CommentController::class);
    Route::get( '/comments/{postId}/posts', [CommentController::class,'getCommentsByPost']);
});






