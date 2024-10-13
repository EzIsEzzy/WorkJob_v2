{{-- Show your user info, with a button to rename (edit) his name, and can view his own posts, each with 2 buttons to delete or update it --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    @auth()
    <h1>Welcome to your profile, <span style="color: darkgreen"> {{ Auth::user()->name }} </span></h1>
    <br>
    Here is your Profile settings.. adjust them to how you see fit: <br>
    <br>
    Name: {{Auth::user()->name}}
    <a href="{{url('user/edit')}}">Edit Name</a>

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
    @forelse ($posts as $post)

            <tbody>
                <tr>
                    <td>{{$post->content}}</td>
                    <td> <a href="{{url('user/post/edit/'. $post->id)}}">Update</a> <a href="{{url('user/post/delete/'. $post->id)}}">Delete</a> </td>
                </tr>
            </tbody>


        @empty

        <tr><td colspan="3"> No Posts to show </td></tr>
    </table>
    @endforelse
    @endauth

</body>
</html>
