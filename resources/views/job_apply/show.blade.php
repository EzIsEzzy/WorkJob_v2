{{-- Show a specific job application, with 2 buttons to deny or accept, and sent via Email afterwards --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applicant Description</title>
</head>
<body>
    <h1>Applicant info for this job</h1>

    @forelse ($applicant as $info)
    <p>Applicant Name: {{$applicant[0]->user->name}}</p>
    <p>Applicant Email: {{$applicant[0]->user->email}}</p>
        <p>Applicant Skills: {{$info->skills}}</p>
        <p>Applicant Education: {{$info->education}}</p>
        <p>Applicant Experience: {{$info->experience}}</p>
        <a href="{{url('apply/accept')}}"><button class="btn btn-primary">Approve</button></a> <a href="{{url('apply/deny')}}"><button class="btn btn-primary">Deny</button></a>
        @empty
        <p>No applicant found</p>
    @endforelse
</body>
</html>
