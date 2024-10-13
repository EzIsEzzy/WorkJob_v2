<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Application Form</title>
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
    <h1>Job Application Form</h1>
    <form action="{{url('apply/confirm')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Applicant Skills</label>
    <textarea name="skills" placeholder="Enter your skills here"></textarea>
    <br>
    <label for="">Applicant Experience</label>
    <textarea name="experience" placeholder="Enter your experience here"></textarea>
    <br>
    <label for="">Applicant Education</label>
    <textarea name="education" placeholder="Enter your education here"></textarea>
    <br><br>
    <input type="hidden" name="job_id" value="{{$job->id}}">
    <label for="">Upload Resume</label>
    <input type="file" name="uploaded_cv" required> <br> <br>
    <input type="submit" value="Submit Application">
    </form>
</body>
</html>
