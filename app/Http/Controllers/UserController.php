<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('home.home');
    }

}
