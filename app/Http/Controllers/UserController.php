<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //list all users
    public function index()
    {
        User::factory(10)->create();
        $users = User::all();

        //always in index, return a view, preferably an index
        return view('user.index', compact('users'));
    }

    public function home()
    {
        $user = Auth::user();
        return view('home.home', compact('user'));
    }

}
