{{-- Update a Post --}}
@extends('layouts.layout')

@section('content1')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="{{Auth::user()->user_picture}}" alt="user_picture">
        </figure>
        <div class="newpst-input">
            <form action="{{url('post/update/'.$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <textarea rows="2" name="content" placeholder="write something"> {{$post->content}} </textarea>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                            <input type="file" name="post_picture">
                        </label>
                        </li>
                        <li>
                            <button type="submit">Post</button>
                        </li>
                    </ul>
                </div>
            </form>
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
    <title>Create a Post</title>
</head>
<body>
    <h1>This is Post Creation Page</h1>


        <textarea  placeholder="Write Something...">  </textarea>
        <input type="submit" >
    </form>
</body>
</html> --}}

