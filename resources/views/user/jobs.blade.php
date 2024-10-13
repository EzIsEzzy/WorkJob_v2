{{-- Show All job applicants and either accept or deny them --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Job Announcements</title>
</head>
<body>
    <h1>Your Job Announcements, <span style="color: darkgreen"> {{Auth::user()->name}} </span></h1>
    @auth()
    @forelse($jobs as $job)
    <img src="{{Storage::url($job->job_picture)}}" width="150" height="100" alt="">
    <h3>Job: {{ $job->job_content }}</h3>
    <ul>
        @forelse($job->jobApplication as $application)
            <li>{{ $application->user->name }} applied for this job. <a href="{{url('applicant/info/applicant_id='.$application->user_id)}}">View Applicant Info</a></li>
            Status:{{ $application->is_accepted ? 'Accepted' : 'Pending' }}
            <br> <br>
        @empty
            <li>No applicants for this job.</li>
        @endforelse
    </ul>
    @empty
    <li>You did not upload any job announcements, <a href="{{url('job/create')}}">Click here to create one</a></li>
@endforelse

        @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</body>
</html>
