{{-- Show All job applicants and either accept or deny them --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Job Announcements</title>
</head>
<body>
    <h1>Your Job Announcements, <span style="color: darkgreen"> {{Auth::user()->name}} </span></h1>
    @auth()
    @forelse($jobs as $job)
    <img src="{{Storage::url($job->job_picture)}}" width="150" height="100" alt="">
    <h3>Job: {{ $job->job_content }}</h3>
    <ul>
        @forelse($job->jobApplication as $application)
            <li>{{ $application->user->name }} applied for this job. <a href="{{url('applicant/info/applicant_id='.$application->id)}}">View Applicant Info</a></li>
            Status:{{ $application->is_accepted ? 'Accepted' : 'Pending' }}
            <br> <br>
        @empty
            <li>No applicants for this job.</li>
        @endforelse
    </ul>
    @empty
    <li>You did not upload any job announcements, <a href="{{url('job/create')}}">Click here to create one</a></li>
@endforelse

        @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</body>
</html> --}}


{{-- Show All jobs --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show All Jobs</title>
</head>
<body>
    @if(session('success'))

    <p class="alert alert-success">{{session('success')}}</p>

    @elseif ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @endif


    <p>Job Announcement from User/Company: {{ $job->user->name }}</p>
    <p>Created At: {{ $job->created_at }}</p>
    Image: <img src="{{Storage::url($job->job_picture)}}" width="50px" height="50px" alt="job_picture">
    <p><a href="{{url('job/show/job_id='. $job->id)}}" class="btn-primary">show more</a> for this Job</p>

    <hr>

    @empty
    <p>No Job Announcements for now</p>
    @endforelse
</body>
</html> --}}

@extends('layouts.layout')

@section('content2')
@if(session('success'))

<p class="alert alert-success">{{session('success')}}</p>

@elseif ($errors->any())
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@endif

@forelse ($jobs as $job)
<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                <img src="{{Storage::url($job->user->user_picture)}}" alt="user_picture">
            </figure>
            <div class="friend-name">
                <h6> User/Company:</h6>
                <ins>{{ $job->user->name }}</ins>
                <span>Published: {{ $job->created_at }}</span>
            </div>
            <div class="description">
                <p style="font-size: 1.2rem">
                    {{$job->job_content}}
                </p>
            </div>
            <div class="post-meta d-flex flex-column justify-content-center align-items-center">
                <img src="{{Storage::url($job->job_picture)}}" alt="job_picture" style="width: 450px; height:450px">

                <div class="description d-flex flex-column justify-content-center">
                    <ul>
                        @forelse($job->jobApplication as $application)
                            <li>{{ $application->user->name }} applied for this job. <a href="{{url('applicant/info/applicant_id='.$application->id)}}"style="color:white; background-color:rgb(33, 145, 145); padding: 10px; margin-left:180px; border-radius: 5px">View Applicant Info</a></li>
                            Status:{{ $application->is_accepted ? 'Accepted' : 'Pending' }}
                            <br> <br>
                        @empty
                            <li>No applicants for this job.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@empty
    <li>You did not upload any job announcements, <a href="{{url('job/create')}}">Click here to create one</a></li>
@endforelse
@endsection


