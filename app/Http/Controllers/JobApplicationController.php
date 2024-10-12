<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    //
    public function create($job_id)
    {
        $job = Job::find($job_id);
        return view('job_apply.create',compact('job'));
    }
    public function store(Request $request)
    {
        //validate the inputs that are coming
        $request->validate([
            'skills' => ['required'],
            'experience' => ['required'],
            'uploaded_cv' => ['required', 'file', 'mimes:pdf,csv'],
            'education' => ['required'],
            'job_id' => ['required'],
        ]);
        $user = Auth::user();
        if(!$user)
            abort(403);
        else
        {

            //check for the uploaded CV if there is one
            if(!$request->hasFile('uploaded_cv'))
                redirect()->back()->with('error', 'there are errors');
            else
            {
                $cv = $request->file('uploaded_cv');
                $cv_name = 'applicant='.Auth::id(). '_' .time().'.'.$cv->getClientOriginalExtension();
                $path = $cv->storeAs('applicants/CVs', $cv_name, 'public');

                JobApplication::create([
                    'user_id' => Auth::id(),
                    'job_id' => $request['job_id'],
                    'skills' => $request['skills'],
                    'experience' => $request['experience'],
                    'education' => $request['education'],
                    'uploaded_cv' => $path,
                ]);
            }
        }
        return redirect('job/index')->with('success', 'Application submitted successfully');
    }
}
