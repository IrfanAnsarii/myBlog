<?php
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiMiddleware;

Route::get('/posts', [PostApiController::class, 'index']);
Route::get('/posts/{slug}', [PostApiController::class, 'show']);


Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
