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
        return view('home.home', compact('user'));
    }

    public function update(Request $request)
    {
        //validate the receiving input
        $request->validate([
            'name' => ['required'],
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
                'name' => $request['name'],
            ];
            $userInfo = User::where('id', Auth::id());
            //update the data
            $userInfo->update($updatedData);

            //return with success message
            return redirect('user')->with('success', 'Post Updated Successfully!');
        }
    }

}
