@extends('layouts.layout')

@section('content2')
@if(session('success'))

<p class="alert alert-success">{{session('success')}}</p>

@elseif ($errors->any())
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@endif

@forelse ($posts as $post)
<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                <img src="{{Storage::url($post->user->user_picture)}}" alt="user_picture">
            </figure>
            <div class="friend-name">
                <ins><a href="time-line.html" title="">{{ $post->user->name }}</a></ins>
                <span>published: {{ $post->created_at }}</span>
            </div>
            <div class="post-meta">
                <img src="{{Storage::url($post->post_picture)}}" alt="post_picture">

                <div class="description">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
            </div>
        </div>
        <div class="coment-area">
            <a href="{{url('post/show/post_id='. $post->id)}}">Show More</a>
        </div>
    </div>
</div>
@empty
<p class="alert alert-secondary text-center">No Posts for now</p>
@endforelse
@endsection
