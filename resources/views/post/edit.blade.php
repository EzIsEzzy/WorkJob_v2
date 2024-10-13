{{-- Update a Post --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update a Post</title>
</head>
<body>
    <h1>This is Post Update Page</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('post/update/'.$post->id)}}" method="post">
        @csrf
        @method('PUT')
        <textarea name="content" placeholder="Write Something..."> {{$post->content}} </textarea>
        <input type="submit" value="Post">
    </form>
</body>
</html>
