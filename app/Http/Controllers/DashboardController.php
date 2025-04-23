<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the total number of posts and users
        $totalPosts = Post::count();
        $totalUsers = User::count();
        $totalCategories = Category::count();


        // Pass the data to the view
        return view('dashboard', compact('totalPosts', 'totalUsers', 'totalCategories'));
    }
}
