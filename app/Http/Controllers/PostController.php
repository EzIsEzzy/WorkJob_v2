<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view ('post.index',compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function show()
    {
        return view('post.show');
    }
    public function store(Request $request)
    {
        //validate the content
        $request->validate([
            'content' => ['required'],
        ]);
        $user= Auth::id();
        if($user)
        {
            Post::create([
                'content' => $request['content'],
                'user_id' => Auth::id(),
            ]);
            return redirect('post/index')->with('success','Post Added Successfully!');
        }
        else
        {
            echo 'you must sign in';
        }

    }
}
