@extends('admin_student.master')
@section('title')
    Teacher Evaluation
@endsection
@section('main')
<div class="container-fluid">
    {{-- data fetch --}}
    @php
        $student = Helper::student_info();
    @endphp
    <h3 class="text-primary text-center mt-3 mb-3">Teachers' Evaluation</h3>
    <div class="row text-center">
        <div class="col-md-3">
            <h6><strong>Student ID:</strong> {{ $student->Registration_Number }}</h6>
        </div>
        <div class="col-md-3">
            <h6><strong>Student Name:</strong> {{ $student->Full_Name }}</h6>
        </div>
        <div class="col-md-3">
            <h6><strong>Current Semester (Evaluating):</strong> {{ $session->semester }}</h6>
        </div>
        <div class="col-md-3">
            <h6><strong>Current Level/Term:</strong> {{ $student->Current_semester }}</h6>
        </div>
    </div>
    
    <h3 class="text-primary text-center mt-3 mb-3">Evaluable Registered Courses</h3>
    <h5 class="text-danger text-center mb-3">If a course is taken by two teachers, evaluate that course twice for two different teachers. If you evaluate a single course for the same teacher it will show an error.</h5>
    <!--Style Table-->
    <div class="row">
        <div class="col-md-12 text-center">
            <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">Course Code</th>
              <th>Course Title</th>
              <th scope="col">Action / Status</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach ($courses as $course)
            @php
                $check = App\TE_Main::where('student_id',$student->Registration_Number)
                                    ->where('semester_id',$session->semester)
                                    ->where('course_id',$course->course_id)
                                    ->count();
            @endphp
              <tr>
                <td>{{ $course->course_code }}</td>
                <td>{{ $course->course_name }}</td>
                <td>
                  @if ($check >= 2)
                    <a href="#" class="btn btn-danger btn-md">Evaluated</a>
                  @else
                    <a href="{{ route('student-teacher-evaluation.create',[$session->semester,$course->course_id]) }}" class="btn btn-outline-primary">Evaluate || Performed: {{ $check }} time</a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('extrascript')

@endsection