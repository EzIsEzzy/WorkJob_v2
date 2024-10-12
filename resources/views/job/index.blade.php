{{-- Show All jobs --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show All Jobs</title>
</head>
<body>
    @if(session('success'))

    <p class="alert alert-success">{{session('success')}}</p>

    @elseif ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @endif

    @forelse ($jobs as $job)
    <p>Job Announcement from User/Company: {{ $job->user->name }}</p>
    <p>Created At: {{ $job->created_at }}</p>
    Image: <img src="{{Storage::url($job->job_picture)}}" width="50px" height="50px" alt="job_picture">
    <p><a href="{{url('show/job_id='. $job->id)}}" class="btn-primary">show more</a> for this Job</p>

    <hr>

    @empty
    <p>No Job Announcements for now</p>
    @endforelse
</body>
</html>
