<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('post.show', compact('post'));
    }
    public function edit(int $id)
    {
        $user= Auth::id();
        if(!$user)
            abort(403);
        else
        {
            $post= Post::findOrFail($id);
            return view('post.edit', compact('post'));
        }
    }
    public function store(Request $request)
    {
        //validate the content
        $request->validate([
            'content' => ['required'],
            'post_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:50000']
        ]);
        $user= Auth::user();
        if($user)
        {
            if(!$request->hasFile('post_picture'))
                echo 'no picture has been uploaded';
            else
            {
                //retrive the picture to the var
                $post_Picture = $request->file('post_picture');
                //store the picture in the variable with a special time and retrives the original extension
                $filename = 'post_pic='.Auth::id().'_'.time() . '.' . $post_Picture->getClientOriginalExtension();
                // Store the file
                $path = $post_Picture->storeAs('images/post_pictures', $filename, 'public');

                Post::create([
                    'content' => $request['content'],
                    'user_id' => Auth::id(),
                    'post_picture' => $path,
                ]);
            }

            return redirect('post/index')->with('success','Post Added Successfully!');
        }
        else
        {
            echo 'you must sign in';
        }

    }
    public function update(Request $request, int $id)
    {
        //validate the receiving input
        $request->validate([
            'content' => ['required'],
        ]);
        //fetch the user ID
        $user= Auth::id();
        //if not signed in, i
        if(!$user)
            abort(403);
        else
        {
            //store the validated data in an array
            $updatedData = [
                'content' => $request['content'],
            ];
            //store the result in a variable
            $post_content = Post::findOrFail($id);

            //update the data
            $post_content->update($updatedData);

            //return with success message
            return redirect('user')->with('success', 'Post Updated Successfully!');
        }
    }

    public function delete(int $id)
    {
        //fetch the id for the post
        $post = Post::findOrFail($id);
       if(!$post)
         abort(404);
       else
       {
            $post->delete();
            return redirect()->back()->with('success','Post Deleted Successfully!');
       }
    }
}
