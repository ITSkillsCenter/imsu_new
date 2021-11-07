@extends('layouts.master')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@section('title')
Student || Course
@endsection
@section('content')

<section class="">
  <div class="col-lg-12"><h4><br>Exam Attendance</h4></div>
  <div class="col-lg-12">
    <form method="post" class="card">
      @csrf
      <div class="card-header">
        Select Level, Sememster and Session to Continue
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Level<span class="required">*</span>
            </label>
            <select name="level" class="form-control" required>
              <option value="">Select Level</option>
              <option value="100">100 Level</option>
              <option value="200">200 Level</option>
              <option value="300">300 Level</option>
              <option value="400">400 Level</option>
              <option value="500">500 Level</option>
              <option value="600">600 Level</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Semester<span class="required">*</span>
            </label>
            <select name="semester" class="form-control" required>
              <option value="">Select Semester</option>
              @foreach($semesters as $semester)
              @php $sm = explode(' ',$semester->name);@endphp
              <option value="{{$sm[0]}}">{{$semester->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Session<span class="required">*</span>
            </label>
            <select name="session_id" class="form-control" required>
              <option value="">Select Session</option>
              @foreach($all_sessions as $sess)
                <option value="{{$sess->id}}">{{$sess->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Courses<span class="required">*</span>
            </label>
            <select name="course_id" id="single" class="form-control" required>
              <option value="">Select course</option>
              @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->course_code}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <br>
            @if($pending_payments > 0 && $check_for_payment_history > 0)
              <p>You have pending payment(s)!</p>
              <p>Please clear all pending payments to continue course registration</p>
              <a class="btn btn-warning" href="/student-payment">Proceed to payment</a>
            @else
              <button class="btn btn-success m-2" type="submit">Proceed</button>
            @endif
        </div>
        <div class="col-md-4"></div>
        <br>
      </div>
      
    </form>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
          placeholder: "Select a course",
          allowClear: true
      });
      $("#multiple").select2({
          placeholder: "Select a programming language",
          allowClear: true
      });
    </script>

@endsection