<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function PostComment(Request $request){
        $authUser = Auth::check();
        // dd($user);
        if ($authUser === false) {
             session()->flash('error', 'Please Login to Comments on Post');
             return to_route('post.index');
        }
        $request->validate([
            'comment' => 'required|string|max:1000', 
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the post where the comment is being added
        $post = Post::find($request->post_id);
        // dd($post);
         // Check if the post exists
         if (!$post) {
            session()->flash('error', 'Post not found.');
            return redirect()->route('post.index');
        }

        Comment::create([
             'user' => $user->user_id,
             'comment' => $request->comment,
             'post' => $post->post_id
        ]);
        session()->flash('success', 'Comment Post');
        return redirect()->route('post.index');
    }
}
