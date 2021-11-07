@extends('admin_student.master')
@section('title')
    Teacher Evaluation
@endsection
@section('extrastyle')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
@endsection
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead></thead>
                <tbody>
                    <tr>
                        <td><b>Student ID:</b></td>
                        <td>{{ $student->Registration_Number }}</td>
                    </tr>
                    <tr>
                        <td><b>Department:</b></td>
                        <td>{{ $student->Program }}</td>
                    </tr>
                    <tr>
                        <td><b>Student Name:</b></td>
                        <td>{{ $student->Full_Name }}</td>
                    </tr>
                    <tr>
                        <td><b>Evaluating Semester:</b></td>
                        <td>{{ $session }}</td>
                    </tr>
                    <tr>
                        <td><b>Current Level/Term:</b></td>
                        <td>{{ $student->Current_semester }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <h3 class="text-primary text-center mt-3 mb-3"> <u>Please Choose on a Scale of 5</u></h3>
    <form method="POST" action="{{ route('student-teacher-evaluation.store') }}" enctype="multipart/form-data">
    @csrf
        <h3 class="text-primary mt-3 mb-3">Evaluating Course</h3>
        <div class="row">
            <div class="col-md-2">
                <label for="course code">Course Code: {{ $this_course->course_code }}</label>
                <input type="text" name="student_id" value="{{ $student->Registration_Number }}" hidden>
                <input type="text" name="semester_id" value="{{ $session }}" hidden>
                <input type="text" name="department" value="{{ $student->Program }}" hidden>
                <input type="text" value="{{ $this_course->id }}" name="course_id" hidden>
            </div>
            <div class="col-md-4">
                <h6><strong>Course Title:</strong> {{ $this_course->course_name }}</h6>
            </div>
            <div class="col-md-2">
                <label for="">Course Teacher: </label>
            </div>
            <div class="col-md-4">
                <select name="faculty_id" class="form-control select2" style="width: 100%" required>
                    <option value="" selected disabled>Please choose faculty name....</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name.' - '.$faculty->sort_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <br>
        @foreach ($questions_category as $qc)
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary">{{ "Category - ".$loop->iteration.': '.$qc->category_name }}</h4>
                </div>
                @php
                    $questions = \App\TE_Question::where('question_category',$qc->id)->get();
                @endphp
                @foreach ($questions as $qs)
                    <div class="col-md-8">
                        <h5>&nbsp; {{ $loop->iteration.'. '.$qs->question_title }}</h5>
                        <input type="text" name="question_category[]" value="{{ $qc->id }}" hidden> 
                        <input type="text" name="question_id[]" value="{{ $qs->id }}" hidden> 
                    </div>
                    <div class="col-md-4">
                        <select name="marks[]" class="form-control">
                            <option value="5">5 - Strongly Agree</option>
                            <option value="4">4 - Agree</option>
                            <option value="3">3 - Moderately Agree</option>
                            <option value="2">2 - Least Agree</option>
                            <option value="1">1 - Disagree</option>
                        </select>
                    </div>
                @endforeach
            </div>
            <br>
            <br>
        @endforeach
        <div class="row">
            <div class="col-md-12">
                <label for="remarks">Comments (if any): </label>
                <textarea name="remarks" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md float-right mb-3 mt-3">submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('extrascript')
<!-- dataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<!-- /validator -->
@endsection
