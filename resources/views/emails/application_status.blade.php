<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Application Status</title>
</head>
<body>
    <h1>Dear {{ $applicant->user->name }},</h1>
    <p>Your application for the job "{{ $applicant->job->job_content }}" has been {{ $is_accepted }}.</p>
    <p>We appreciate your interest in the position, and we wish you all the best in your future endeavors.</p>

    <p>Best regards,</p>
    <p> WorkJob Team</p>
</body>
</html>
