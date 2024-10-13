{{-- Show all posts --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show All Posts</title>
</head>
<body>
    @if(session('success'))

    <p class="alert alert-success">{{session('success')}}</p>

    @elseif ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @endif

    @forelse ($posts as $post)
    <p>Post Content: {{$post->content}}</p>
    <p>For User: {{ $post->user->name }}</p>
    <p>Created At: {{ $post->created_at }}</p>
    <a href="{{url('post/show/post_id='. $post->id)}}">Show More</a>

    @empty
    <p>No Posts for now</p>
    @endforelse
</body>
</html>
