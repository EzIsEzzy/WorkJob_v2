<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //list all users
    public function show()
    {
        if(!Auth::user())
            abort(403);
        else
        {
            $posts = Post::where('user_id', Auth::id())->get();
            //always in index, return a view, preferably an index
            return view('user.index', compact('posts'));
        }
    }
    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        if(!$user)
            abort(403);
        else
            return view('user.edit', compact('user'));
    }

    public function home()
    {
        $user = Auth::user();
        $posts = Post::all();
        return view('post.index', compact('user', 'posts'));
    }

    public function update(Request $request)
    {
        //validate the receiving input
        $request->validate([
            'name' => ['required'],
            'user_picture' => ['required', 'image', 'max:50000'],
        ]);
        //fetch the user ID
        $user= Auth::id();
        //if not signed in, i
        if(!$user)
            abort(403);
        else
        {
            if(!$request->hasFile('user_picture'))
                $path = "images/user_pictures/profile_pfp_default.png";
            else
            {
                //retrive the picture to the var
                $user_Picture = $request->file('user_picture');
                //store the picture in the variable with a special time and retrives the original extension
                $filename = 'user_pic='.Auth::id().'_'.time() . '.' . $user_Picture->getClientOriginalExtension();
                // Store the file
                $path = $user_Picture->storeAs('images/user_pictures', $filename, 'public');
            }
            //store the validated data in an array
            $updatedData = [
                'name' => $request['name'],
                'user_picture' => $path
            ];
            $userInfo = User::where('id', Auth::id());
            //update the data
            $userInfo->update($updatedData);

            //return with success message
            return redirect('user')->with('success', 'Post Updated Successfully!');
        }
    }

}
