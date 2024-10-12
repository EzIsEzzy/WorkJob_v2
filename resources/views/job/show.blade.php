{{-- Show a specific job announcement, and a click to apply to it --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show a specific job Announcement</title>
</head>
<body>
    <div>
        <h1>Job Announcement!</h1>
        <img src="{{ Storage::url($job->job_picture) }}" width="100px" height="100px">
        <p>Content: {{ $job->job_content }}</p>
        <a href="{{url('apply/job='.$job->id )}}">Apply for this job</a>
    </div>
</body>
</html>
