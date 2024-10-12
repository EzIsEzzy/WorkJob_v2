<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('job.index',compact('jobs'));
    }
    public function create()
    {
        return view('job.create');
    }
    public function show()
    {
        //what if i wanted to show the posts of a specific user?
        $user = Auth::user();
        if($user)
        {
            $jobs = Job::where('user_id', $user->id)->get();
            return view('job.show',compact('jobs'));
        }
        else
            abort(404);
    }
}
