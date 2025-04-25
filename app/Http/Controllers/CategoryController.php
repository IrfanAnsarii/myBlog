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

    public function managementPage()
{
    $categories = Category::all();
    return view('categorymanagementpage', compact('categories'));
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
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
    ]);
    Category::create(['name' => $request->name]);
    return redirect()->route('category.management')->with('success', 'Category created!');
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
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $id,
    ]);
    $category = Category::findOrFail($id);
    $category->name = $request->name;
    $category->save();
    return redirect()->route('category.management')->with('success', 'Category updated!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('category.management')->with('success', 'Category deleted!');
}
}
