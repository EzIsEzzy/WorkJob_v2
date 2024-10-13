{{-- Show a specific Post to see the comments --}}
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
                <img src="{{Storage::url($post->user->user_picture)}}" alt="user_picture">
            </figure>
            <div class="friend-name">
                <ins><a href="time-line.html" title="">{{ $post->user->name }}</a></ins>
                <span>published: {{ $post->created_at }}</span>
            </div>
            <div class="post-meta">
                <div class="description">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                <img src="{{Storage::url($post->post_picture)}}" alt="post_picture">
            </div>
        </div>
        <div class="coment-area">
            <ul class="we-comet">
                @forelse ($post->comment as $comment)
                <li>
                    <div class="comet-avatar">
                        <img src="{{Storage::url($comment->user->user_picture)}}" alt="commenter_pfp">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5>{{$comment->user->name }}</h5>
                            <span>published at {{$comment->created_at}}</span>
                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                        </div>
                        <p>{{ $comment->content }}</p>
                    </div>
                    @empty
                    <li>No Comments</li>
                @endforelse
                </li>
                <li class="post-comment">
                    <div class="comet-avatar">
                        <img src="{{Storage::url(Auth::user()->user_picture)}}" alt="user_picture">
                    </div>
                    @auth()
                    <div class="post-comt-box">
                        <form action="{{url('comment/store/post_id='.$post->id)}} " method="post">
                            @csrf
                            <textarea name="content" placeholder="Add a Comment"></textarea>
                            <div class="row mt-5">
                            <button type="submit" style="background-color: gray" class="btn btn-primary">Comment</button>
                        </div>
                        </form>
                    </div>
                    @else
                    <p>You must Sign in to create a comment</p>
                    @endauth
                </li>

            </ul>
        </div>
    </div>
</div>
@endsection
