{{-- Show the user's name, and edit it, with a button to Apply the editing--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile Update</title>
</head>
<body>
    <h1>Update your profile page</h1>
    <form action="{{url('user/update')}}" method="post">
    @csrf
    @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$user->name}}">
        <input type="submit" class="btn btn-primary" value="Apply">
</body>
</html>
