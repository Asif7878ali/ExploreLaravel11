<?php

namespace App\Http\Controllers;

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
        } else {
             dd($request->all());
        }
        
       
    }
}
