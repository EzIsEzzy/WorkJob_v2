
{{-- Create a Job --}}
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
            <form action="{{url('job/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea rows="2" name="job_content" placeholder="Publish a new job..."></textarea>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                            <input type="file" name="job_picture" id="picture">
                        </label>
                        </li>
                        <li>
                            <button type="submit">Publish</button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
