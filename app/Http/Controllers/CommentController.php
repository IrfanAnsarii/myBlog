<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }

    public function index()
    {
        $comments = Comment::with(['post', 'user'])->latest()->paginate(10);
        return view('comment.managecomments', compact('comments'));
    }

    public function toggle($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->approved = !$comment->approved;
        $comment->save();

        return redirect()->back()->with('success', 'Comment status updated.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted.');
    }
}
