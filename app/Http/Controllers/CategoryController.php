<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function show(Request $request, $categoryName)
    {
        $category = Category::where('name', $categoryName)->firstOrFail();
        $categories = Category::all();

        // Handle AJAX request for loading more posts
        if ($request->ajax()) {
            $page = $request->input('page', 1);
            $posts = Post::where('category_id', $category->id)
                ->orderBy('published_at', 'desc')
                ->with('category', 'user')
                ->paginate(8, ['*'], 'page', $page);

            return response()->json([
                'posts' => $posts->items(),
                'hasMore' => $posts->hasMorePages()
            ]);
        }

        // Initial page load: fetch first 16 posts
        $posts = Post::where('category_id', $category->id)
            ->orderBy('published_at', 'desc')
            ->with('category', 'user')
            ->paginate(8);

        return view('category', compact('category', 'categories', 'posts'));
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::all();
        // return view('index', compact('categories'));
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
