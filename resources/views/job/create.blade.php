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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1>This is Job Announcement Creation Page</h1>
    <form action="{{url('job/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <textarea name="job_content" placeholder="Publish a new job..."></textarea> <br> <br>
        <label for="picture">Picture: </label>
        <input type="file" name="job_picture" id="picture"> <br> <br>
        <input type="submit" value="Publish">
    </form>
</body>
</html>
