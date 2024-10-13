{{-- Show a specific job announcement, and a click to apply to it --}}

@extends('layouts.layout')

@section('content2')
@if(session('success'))

<p class="alert alert-success">{{session('success')}}</p>

@elseif ($errors->any())
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@endif

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
            <div class="post-meta">
                <div class="description">
                    <p>
                        {{ $job->job_content }}
                    </p>
                </div>
                <img src="{{ Storage::url($job->job_picture) }}" width="100px" height="100px">
            </div>
        </div> <br>
        <div class="coment-area d-flex flex-column justify-content-center text-center">
            <br>
            <a href="{{url('apply/job='.$job->id )}}" style="color:white; background-color:rgb(33, 145, 145); padding: 10px; border-radius: 5px">Apply for this job</a>
        </div>
    </div>
</div>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show a specific job Announcement</title>
</head>
<body>
    <div>
        <h1>Job Announcement!</h1>
        <img src="{{ Storage::url($job->job_picture) }}" width="100px" height="100px">
        <p>Content: </p>

    </div>
</body>
</html> --}}




