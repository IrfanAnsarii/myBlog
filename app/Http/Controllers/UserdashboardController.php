<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserdashboardController extends Controller
{
    public function index()
    {
        //$user = Auth::user();
        $totalPosts = Auth::user()->posts()->count();
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $posts = Auth::user()->posts()->with('category')->latest()->paginate(10);

        return view('user_dashboard', compact('totalPosts', 'totalUsers', 'totalCategories', 'posts'));
    }
}
