<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    //storing a comment
    public function store($post_id, Request $request)
    {
        //validate the content of the comment
        $user = Auth::id();
        if ($user)
        {
            $request->validate([
                'content' => 'required'
            ]);

            //store the comment
            Comment::create([
                'content' => $request['content'],
                'post_id' => $post_id,
                'user_id' => Auth::id(),
            ]);
            return redirect('post/index')->with('success','Comment Added Successfully!');
        }
    }
    public function update($post_id)
    {}
}
