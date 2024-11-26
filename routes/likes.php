<?php

use Illuminate\Support\Facades\Route;
use App\Like\Adapters\Controller\LikeController;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource( '/likes', LikeController::class);
});






