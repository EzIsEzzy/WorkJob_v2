{{-- Home Page that it will direct to --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Listing Website</title>
</head>
<body>
    <div class="row d-flex justify-content-center">
        <h1>Welcome to Job Listing Website</h1> <br><br>
        <h3>Welcome home, <span style="color: darkgreen;">{{ $user->name }}</span>!</h3>
        <p>This is a simple job listing website where you can find and apply for various jobs.</p>
        <p><a href="{{url('job/index')}}">View All Jobs</a></p>
        <p><a href="{{url('post/index')}}">View All Posts</a></p>

        <p><a href="{{url('job/create')}}">Create a Job Announcement</a></p>
        <p><a href="{{url('post/create')}}">Create a Post</a></p>
        <p><a href="{{url('user/job')}}">Show My Jobs</a></p>
        <p><a href="{{url('user/')}}">Show My Profile</a></p>
    </div>




</body>
</html>
