{{-- Show a specific job application, with 2 buttons to deny or accept, and sent via Email afterwards --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applicant Description</title>
</head>
<body>
    <h1>Applicant info for this job</h1>





</body>
</html> --}}


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
            @forelse ($applicant as $info)
            <div class="friend-name">
                <h6> User/Company:</h6>
                {{-- <ins>{{ $applicant->user->name }}</ins> --}}
                {{-- <span>Published: {{ $applicant[0]->job->created_at }}</span> --}}
            </div>
            <div class="post-meta">
                <div class="description">
                    <p>
                        <p>Applicant Name: {{$applicant[0]->user->name}}</p>
                        <p>Applicant Email: {{$applicant[0]->user->email}}</p>
                        <p>Applicant Skills: {{$info->skills}}</p>
                        <p>Applicant Education: {{$info->education}}</p>
                       <p>Applicant Experience: {{$info->experience}}</p>
                    </p>
                </div>
                @empty
                        <p>No applicant found</p>
                         @endforelse
            </div>
        </div> <br>
        <div class="coment-area d-flex flex-column justify-content-center text-center">
            <br>
            <a href="{{url('apply/accept/'.$info->user->id)}}" style="color:white; background-color:rgb(33, 145, 145); padding: 10px; border-radius: 5px">Approve</a> <br>
            <a style="color:white; background-color:rgb(145, 33, 33); padding: 10px; border-radius: 5px" href="{{url('apply/deny/'.$info->user->id)}}">Deny</a>
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





