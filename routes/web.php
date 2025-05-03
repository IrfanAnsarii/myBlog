<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserdashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\PostApiController;


// Public routes
Route::get('/', [PostController::class, 'index']);
Route::get('/load-more', [PostController::class, 'loadMore'])->name('loadMore');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/category/{categoryName}', [CategoryController::class, 'show'])->name('category.show');

// Admin-only routes (e.g., user role management, category management, dashboard)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    // Category management
    Route::get('/admin/categorymanagement', [CategoryController::class, 'managementPage'])->name('category.management');
    Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('category.create');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    //comment routes
    Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments');
    //Route::post('/admin/comments/{id}/approve', [CommentController::class, 'approve'])->name('admin.comments.approve');
    Route::delete('/admin/comments/{id}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');
    Route::post('/admin/comments/{id}/toggle', [CommentController::class, 'toggle'])->name('admin.comments.toggle');

    // Add your user role management routes here, e.g.:
    // Route::post('/admin/user/{id}/role', [AdminController::class, 'updateRole'])->name('admin.user.role');
    Route::get('/admin/managerole', [AdminController::class, 'manageRoles'])->name('admin.managerole');
    Route::post('/admin/user/{id}/role', [AdminController::class, 'updateRole'])->name('admin.user.role');
});

// Author and admin can manage posts
Route::middleware(['auth', 'role:author,admin'])->group(function () {
    Route::get('/admin/createpost', [PostController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/admin/editpost', [PostController::class, 'editpostpage'])->name('editpostpage');
    Route::get('/admin/deletepost', [PostController::class, 'deletepostpage'])->name('deletepostpage');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/admin/poststatus', [PostController::class, 'poststatuspage'])->name('poststatuspage');
    Route::post('/admin/poststatus/update/{id}', [PostController::class, 'updateStatus'])->name('poststatus.update');
    Route::get('/user/dashboard', [UserdashboardController::class, 'index'])->name('user.dashboard');

});


// All authenticated users can comment and manage their profile
Route::middleware(['auth'])->group(function () {
    Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/dashboard', [UserdashboardController::class, 'index'])->name('user.dashboard');

});

//api routes
Route::prefix('apis')->group(function () {
    Route::get('/posts', [PostApiController::class, 'index']);
    Route::get('/posts/{slug}', [PostApiController::class, 'show']);
    Route::get('/categories', [PostApiController::class, 'categoryfetchapi']);
});


require __DIR__.'/auth.php';
