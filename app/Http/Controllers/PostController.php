<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::with('category', 'user')->whereNotNull('published_at')->latest()->take(12)->get(); // Fetch only 12 posts
        $sliders = Post::latest()->whereNotNull('published_at')->take(5)->get();

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

            // Only fetch approved comments
            $comments = $post->approvedComments()->latest()->get();
        return view('post', compact('post', 'categories', 'relatedPosts','comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch categories for the dropdown
        $categories = Category::all();
        return view('post.createpost', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'keywords' => 'nullable|string|max:255',
            'slug' => 'required|string|unique:posts,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_link' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Ensure at least one image source is provided
        if (!$request->hasFile('image') && !$request->input('image_link')) {
            return back()->withErrors(['image' => 'You must upload an image or provide an image link.']);
        }

        // Handle image upload or link
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts','public'); // Store the image in the 'public/posts' directory
            $imagePath = Str::replaceFirst('public', 'storage', $imagePath); // Generate the URL-friendly path
            $imagePath = "../storage/" . $imagePath; // Adjust the path for the view
        } elseif ($request->input('image_link')) {
            $imagePath = $request->input('image_link');
        } else {
            $imagePath = null;
        }

        // Create the post
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'keywords' => $request->input('keywords'),
            'slug' => $request->input('slug'),
            'image' => $imagePath,
            'category_id' => $request->input('category_id'),
            'views' => 0,
            'likes' => 0,
            'comments_count' => 0,
            'is_published' => true,
            'published_at' => now(),
        ]);

        // Redirect back with success message
        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */

     public function editpostpage(Request $request)
     {
         $categories = Category::all();

         // Only show posts by this author if not admin
         $query = Post::with('category', 'user')->whereNotNull('published_at');
         if (Auth::check() && Auth::user()->role !== 'admin') {
             $query->where('user_id', Auth::id());
         }
         if ($request->has('search') && $request->search) {
             $query->where('title', 'like', '%' . $request->search . '%');
         }

         $posts = $query->latest()->paginate(10);

         return view('post.editpostpage', compact('posts', 'categories'));
     }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $post = Post::findOrFail($id);
    // Only allow admin or the post's author
    if (Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }
    $categories = Category::all();
    return view('post.editpost', compact('post','categories'));
}




    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    if (Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'content' => 'required|string',
        'keywords' => 'nullable|string|max:255',
        'slug' => 'required|string|unique:posts,slug,' . $post->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_link' => 'nullable|url',
        'category_id' => 'required|exists:categories,id',
    ]);

    if (!$request->hasFile('image') && !$request->input('image_link')) {
        return back()->withErrors(['image' => 'You must upload an image or provide an image link.']);
    }

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts','public');
        $imagePath = Str::replaceFirst('public', 'storage', $imagePath);
        $imagePath = "../storage/" . $imagePath; // Adjust the path for the view
    } elseif ($request->input('image_link')) {
        $imagePath = $request->input('image_link');
    } else {
        $imagePath = $post->image; // Keep the existing image
    }

    $post->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'content' => $request->input('content'),
        'keywords' => $request->input('keywords'),
        'slug' => $request->input('slug'),
        'image' => $imagePath,
        'category_id' => $request->input('category_id'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $post = Post::findOrFail($id);
    // Only allow admin or the post's author
    if (Auth::check() && Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }
    $post->delete();

    return redirect()->route('deletepostpage')->with('success', 'Post deleted successfully!');
}
/**
 * Display the delete post page with a list of posts.
 */
public function deletepostpage(Request $request)
{
    $categories = Category::all();

    $query = Post::with('category', 'user');
    if (Auth::user()->role !== 'admin') {
        $query->where('user_id', Auth::id());
    }
    if ($request->has('search') && $request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $posts = $query->latest()->paginate(10);

    return view('post.deletepostpage', compact('posts', 'categories'));
}

public function poststatuspage(Request $request)
{
    $query = Post::with('category', 'user');
    if (Auth::check() && Auth::user()->role !== 'admin') {
        $query->where('user_id', Auth::id());
    }
    $posts = $query->latest()->paginate(10);
    return view('post.poststatuspage', compact('posts'));
}


public function updateStatus(Request $request, $id)
{
    $post = Post::findOrFail($id);
    // Only allow admin or the post's author
    if (Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    $request->validate([
        'likes' => 'required|integer|min:0',
        'views' => 'required|integer|min:0',
        'is_published' => 'required|boolean',
        'published_at' => 'nullable|date',
    ]);

    $post->likes = $request->likes;
    $post->views = $request->views;
    $post->is_published = $request->is_published;
    $post->published_at = $request->is_published ? $request->published_at : null;
    $post->save();

    return redirect()->route('poststatuspage')->with('success', 'Post status updated!');
}

}
