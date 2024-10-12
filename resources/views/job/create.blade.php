{{-- Create a Post --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Job Announcement</title>
</head>
<body>
    <h1>This is Job Announcement Creation Page</h1>
    <form action="{{url('job/store')}}" method="post">
        @csrf
        <textarea name="content" placeholder="Write Something..."></textarea>
        <input type="submit" value="Post the Job Announcement">
    </form>
</body>
</html>
