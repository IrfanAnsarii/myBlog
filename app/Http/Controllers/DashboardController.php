<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $totalPosts = Post::count();
            $totalUsers = User::count();
            $totalCategories = Category::count();
            $posts = Post::with('category', 'user')->latest()->paginate(10);
        } else {
            $totalPosts = Post::where('user_id', Auth::id())->count();
            $totalUsers = 1; // Only the current author
            $totalCategories = Category::count();

        }


        // Pass the data to the view
        return view('dashboard', compact('totalPosts', 'totalUsers', 'totalCategories'));
    }
}
