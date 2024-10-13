@extends('layouts.layout')

@section('content2')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="central-meta">
<div class="editing-info">
    <h5 class="f-title"><i class="ti-info-alt"></i>Job Application Form</h5>

    <form action="{{url('apply/confirm')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea name="skills" placeholder="Enter your skills here"></textarea>
          <label class="control-label" for="input">Applicant Skills</label><i class="mtrl-select"></i>
        </div>
        <div class="form-group">
            <textarea name="education" placeholder="Enter your education here"></textarea>
          <label class="control-label" for="input">Applicant Education</label><i class="mtrl-select"></i>
        </div>
        <div class="form-group">
            <textarea name="experience" placeholder="Enter your experience here"></textarea>
          <label class="control-label" for="input">Applicant Experience</label><i class="mtrl-select"></i>
          <input type="hidden" name="job_id" value="{{$job->id}}">
        </div>
        <div class="form-group">
            <label class="" for="input" style="padding-bottom: 10px">Upload Resume</label><i class="mtrl-select"></i>
            <input type="file" name="uploaded_cv" required>
        </div>
            <button type="submit" class="mtr-btn"><span>Apply Now</span></button>
        </div>
    </form>
</div>
</div>

@endsection
