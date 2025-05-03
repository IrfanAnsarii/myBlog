<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    // Fetch all published posts with category, user, and comments
    public function index(Request $request)
    {
        $posts = Post::with(['category', 'user', 'comments'])
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return response()->json($posts);
    }

    // Fetch a single post by slug with category, user, and comments
    public function show($slug)
    {
        $post = Post::with(['category', 'user', 'comments'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return response()->json($post);
    }

    public function categoryfetchapi()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

}
