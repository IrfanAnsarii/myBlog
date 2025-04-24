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


Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/createpost', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts.create');
Route::post('/admin/posts', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts.store');
// Route to show the edit post form
Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');
// Route to update the post
Route::put('/admin/posts/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');
Route::get('/admin/editpost', [PostController::class, 'editpostpage'])->middleware(['auth', 'verified'])->name('editpostpage');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
