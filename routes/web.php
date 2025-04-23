<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [PostController::class, 'index']);
Route::get('/load-more', [PostController::class, 'loadMore'])->name('loadMore');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/category/{categoryName}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/admin', function () {
    return view('dashboard', ['header' => true]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
