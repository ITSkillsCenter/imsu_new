@extends('admin_student.master')
@section('title')
Student || Course
@endsection
@section('content')
<div class="col-lg-12">
    <br>
    <a href="/select-registration" class="btn btn-primary">Back</a>
    <div class="card">
        <div class="col-lg-12">@include('homepage.flash_message')</div>
        <h3 class="text-center col-md-12"><br> Courses registered <br></h3>
        <p class="text-center"><small>These are your registered semester courses</small></p>
        <p class="text-center">Level: {{$level}} Level &nbsp;&nbsp; | &nbsp;&nbsp; Semester: {{$semester}} &nbsp;&nbsp; |  &nbsp;&nbsp;Session {{Helper::get_session($session)}}</p>
        <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
            @if(count($reg_courses)>0)
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Unit</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="">
                    @if(count($reg_courses)>0)
                    @php $sn = 1; $count = 0; @endphp
                    @foreach($reg_courses as $course)
                    @php $count = $course->unit + $count; @endphp
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->unit}}</td>
                        <td>{{$course->type}}</td>
                        <td>
                            @if($curr_semester == $session && $semester. ' Semester' == Helper::get_sem())
                                @if($course->type !== 'compulsory')
                                <a href="/remove-course/{{$course->cid}}" class="btn btn-primary">Remove</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right text-success">Total Unit:</td>
                        <td class="text-success" style="font-weight:1000;">{{$count}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @else
            <div class="alert alert-primary text-center">You have not registered any courses yet!</div>
            @endif
        </div>
    </div>
</div>
@endsection