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
    public function store(Request $request)
    {
        $request->validate([
            'job_content' => ['required'],
            'job_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:50000'],

        ]);
        $user = Auth::user();
        if(!$user)
            abort(404);
        else
        {
            //checks if the user posted a job picture
            if(!$request->hasFile('job_picture'))
                echo 'no picture has been uploaded';
            else
            {
                //retrive the picture to the var
                $jobPicture = $request->file('job_picture');
                //store the picture in the variable with a special time and retrives the original extension
                $filename = 'job_pic='.Auth::id().'_'.time() . '.' . $jobPicture->getClientOriginalExtension();
                // Store the file
                $path = $jobPicture->storeAs('images/job_pictures', $filename, 'public');

                Job::create([
                    'job_content' => $request['job_content'],
                    'job_picture' => $path,
                    'user_id' => Auth::id(),
                ]);
            }

        }
        return redirect('job/index')->with('success','Job announcement Added Successfully!');
    }
}
