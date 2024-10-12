{{-- Create a Post --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Post</title>
</head>
<body>
    <h1>This is Post Creation Page</h1>
    <form action="{{url('post/store')}}" method="post">
        @csrf
        <textarea name="content" placeholder="Write Something..."></textarea>
        <input type="submit" value="Post the Post">
    </form>
</body>
</html>
