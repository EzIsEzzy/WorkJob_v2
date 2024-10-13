{{-- Show your user info, with a button to rename (edit) his name, and can view his own posts, each with 2 buttons to delete or update it --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    @auth()
    <h1></h1>
    <br>
    Here is your Profile settings.. adjust them to how you see fit: <br>
    <br>
    Name:


    <h1>Your Posts</h1>
    @if (session('success'))
            <p class="alert alert-success">{{session('success')}} </p>
    @endif
    <table style="table-layout: fixed;" border="1">
        <thead>
            <tr>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>


            <tbody>
                <tr>
                    <td></td>
                    <td>  </td>
                </tr>
            </tbody>




        <tr><td colspan="3"> No Posts to show </td></tr>
    </table>

    @endauth

</body>
</html> --}}

@extends('layouts.layout')

@section('content2')
<div class="central-meta">
    <div class="about">
        <div class="personal">
            <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
            <h4>
                Welcome to your profile, <span style="color: rgb(28, 117, 117)">{{ Auth::user()->name }}</span>
            </h4> <br>
        </div>
        <div class="d-flex flex-row mt-2">
            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
                <li class="nav-item">
                    <a href="#basic" class="nav-link active" data-toggle="tab">Basic info</a>
                </li>
                <li class="nav-item">
                    <a href="#location" class="nav-link" data-toggle="tab">Posts</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="basic">
                    <ul class="basics">
                        <li><i class="ti-user"></i>{{Auth::user()->name}}  <a href="{{url('user/edit')}}"style="color:white; background-color:rgb(33, 145, 145); padding: 10px; margin-left:250px; border-radius: 5px">Edit</a></li>
                        <li><i class="ti-email"></i>{{Auth::user()->email}}</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="location" role="tabpanel">
                    <ul class="basics">
                        {{-- <li>Footbal</li>
                        <li>internet</li>
                        <li>photography</li> --}}
                        @forelse ($posts as $post)
                        <li style="padding-top: 20px">Content: {{$post->content}} </li>
                        <li><img src="{{Storage::url($post->post_picture)}}" alt=""></li>
                        <a style="color:white; background-color:rgb(33, 145, 145); padding: 10px; border-radius: 5px" href="{{url('user/post/edit/'. $post->id)}}">Update</a> <a style="color:white; background-color:rgb(129, 34, 31); padding: 10px; border-radius: 5px" href="{{url('user/post/delete/'. $post->id)}}">Delete</a>
                        @empty
                        @endforelse

                    </ul>
                </div>
                <div class="tab-pane fade" id="work" role="tabpanel">
                    <div>

                        <a href="#" title="">Envato</a>
                        <p>work as autohr in envato themeforest from 2013</p>
                        <ul class="education">
                            <li><i class="ti-facebook"></i> BSCS from Oxford University</li>
                            <li><i class="ti-twitter"></i> MSCS from Harvard Unversity</li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="interest" role="tabpanel">

                </div>
                <div class="tab-pane fade" id="lang" role="tabpanel">
                    <ul class="basics">
                        <li>english</li>
                        <li>french</li>
                        <li>spanish</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
