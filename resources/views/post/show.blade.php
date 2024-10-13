{{-- Show a specific Post to see the comments --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A Specific Post</title>
</head>
<body>
    <h1>A Specific Post</h1>
    <p>From {{$post->user->name}}</p>
    <p>Created At: {{$post->created_at}} </p>
    <p>Post Content: {{$post->content}} </p>
    <p>Comments</p>
    <ul>
    @forelse ($post->comment as $comment)
        <li> {{$comment->user->name}} commented: {{ $comment->content }}</li>
    @empty
        <li>No Comments</li>
    @endforelse
    </ul>

    @auth()
    <form action="{{url('comment/store/post_id='.$post->id)}} " method="post">
        @csrf
        <input type="text" name="content" placeholder="Add a Comment">
        <button type="submit">Comment</button>
    </form>
    @else

    <p>You must Sign in to create a comment</p>

    @endauth

</body>
</html>
