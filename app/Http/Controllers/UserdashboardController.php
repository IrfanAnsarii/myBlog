<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class UserdashboardController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user();
    //     $totalPosts = $user->posts()->count();
    //     $totalUsers = User::count();
    //     $totalCategories = Category::count();
    //     $posts = $user->posts()->with('category')->latest()->paginate(10);

    //     return view('user_dashboard', compact('totalPosts', 'totalUsers', 'totalCategories', 'posts'));
    // }
}
