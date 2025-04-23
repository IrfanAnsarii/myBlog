<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::with('category', 'user')->latest()->take(12)->get(); // Fetch only 12 posts
        $sliders = Post::latest()->take(5)->get();

        return view('index', compact('posts', 'categories', 'sliders'));
    }

    public function loadMore(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 8; // Load 8 posts per request
        $offset = ($page - 1) * $perPage + 16; // Skip the initial 16 posts

        $posts = Post::with('category', 'user')
            ->latest()
            ->skip($offset)
            ->take($perPage)
            ->get();

        $hasMore = Post::count() > $offset + $perPage;

        return response()->json([
            'posts' => $posts,
            'hasMore' => $hasMore
        ]);
    }

    public function show($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->firstOrFail();
        $post->increment('views');
        $categories = Category::all();
        // Fetch 5 posts from the same category, ordered by views DESC
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id) // Exclude the current post
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('post', compact('post', 'categories', 'relatedPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
