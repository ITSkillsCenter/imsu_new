@extends('admin_student.layout')
@section('title')
Student || Course
@endsection
@section('content')
<!-- <section class="col-lg-12 container">
  <br><br>
  <div class="row">
    <div class="card col-md-6 col-md-12 table-responsive">
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Student ID:</td>
            <td>{{ $student->matric_number }}</td>
          </tr>
          <tr>
            <td>Student Name:</td>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
          </tr>
          <tr>
            <td>Enrolled Semester:</td>
            <td>{{ $student->Enrollment_Semester }}</td>
          </tr>
          <tr>
            <td>Batch:</td>
            <td>{{ $student->Batch }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card col-md-6 col-md-12 table-responsive">
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Department:</td>
            <td>{{ $department->name }}</td>
          </tr>
          <tr>
            <td>Current Status:</td>
            <td>{{ $student->Current_status }}</td>
          </tr>
          <tr>
            <td>Current Semester:</td>
            <td>{{ $semester }}</td>
          </tr>
          <tr>
            <td>Current Session:</td>
            <td>{{ $session->title }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section> -->

<section class="">
  <div class="col-lg-12"><h4><br> Course Registration</h4></div>
  <div class="col-lg-12">
    <form method="post" class="card">
      @csrf
      <div class="card-header">
        Course Registration for current session, semester and level
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Session<span class="required">*</span>
            </label>
            <select name="session_id" class="form-control" required readonly>
              <option value="{{$current_session->id}}">{{$current_session->title}}</option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Semester<span class="required">*</span>
            </label>
            <select name="semester" class="form-control" readonly required>
              <option value="{{$current_semester->id}}">{{$current_semester->name}}</option>
            </select>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Level<span class="required">*</span>
            </label>
            <select name="level" class="form-control" required readonly>
              <option value="{{$student->level}}">{{$student->level}} Level</option>
            </select>
          </div>
        </div>
        <!-- <div class="col-md-5"></div> -->
        <div class="col-md-12">
          <div class="form-group text-center">
            <br>
            @if($pending_payments > 0 && $check_for_payment_history > 0)
              <p>You have pending payment(s)!</p>
              <p>Please clear all pending payments to continue course registration</p>
              <a class="btn btn-warning" href="/student-payment">Proceed to payment</a>
            @else
              <button class="btn btn-success" type="submit">Proceed</button>
            @endif
          </div>
            
        </div>
        <!-- <div class="col-md-4"></div> -->
        <br>
      </div>
      
    </form>
  </div>
</section>

@endsection