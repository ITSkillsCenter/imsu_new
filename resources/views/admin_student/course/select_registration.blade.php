@extends('admin_student.layout')
@section('title')
Student || Course
@endsection
@section('content')

<section class="">
  <div class="col-lg-12"><h4><br>View Course Registration</h4></div>
  <div class="col-lg-12">
    <form method="post" class="card">
      @csrf
      <div class="card-header">
        Select Level, Sememster and Session to View 
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" for="confirmpassword">Level<span class="required">*</span>
            </label>
            {{-- {{$student->level}} --}}
            <select name="level" class="form-control" required>
              <option value="">Select Level</option>
              @foreach ($levels as $level)
                @if ($student->level >= $level)
                  <option value="{{$level}}">{{$level}} Level</option>
                @endif
              @endforeach
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
              <option value="">Select session</option>
              @foreach($all_sessions as $sess)
                <option value="{{$sess->id}}">{{$sess->title}}</option>
              @endforeach
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