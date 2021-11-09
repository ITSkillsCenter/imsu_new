@extends('admin_student.master')
@section('title')
Student || Course
@endsection
@section('content')
<div class="col-lg-12">
    <br>
    <a href="/select-registration" class="btn btn-primary">Back</a>
    <div class="col-lg-12">@include('homepage.flash_message')</div>
    @if(count($previousPending)>0)
    <div class="card">
        <h3 class="text-center col-md-12"><br>Pending Carry Over Registration<br></h3>
        <p class="text-center"><small>These are your pending carry over course application</small></p>
        <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
           
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
                    @if(count($previousPending)>0)
                    @php $sn = 1; $count = 0; @endphp
                    @foreach($previousPending as $course)
                    @php 
                        $crs = Helper::get_course($course->course_id);
                        $count += $crs->unit; 
                    @endphp
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$crs->course_code}}</td>
                        <td>{{$crs->course_name}}</td>
                        <td>{{$crs->unit}}</td>
                        <td>{{$crs->type}}</td>
                        <td>
                            <a href="/remove-carryover-course/{{$course->id}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="card">
        <h3 class="text-center col-md-12"><br>Carry Over Registration<br></h3>
        <p class="text-center"><small>These are your previous registered courses</small></p>
        <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
            @if(count($previous)>0)
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
                    @if(count($previous)>0)
                    @php $sn = 1; $count = 0; @endphp
                    @foreach($previous as $course)
                    @php 
                        $crs = Helper::get_course($course->course_id);
                        $count += $crs->unit; 
                    @endphp
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$crs->course_code}}</td>
                        <td>{{$crs->course_name}}</td>
                        <td>{{$crs->unit}}</td>
                        <td>{{$crs->type}}</td>
                        <td>
                            <a href="/add-carryover-course/{{$crs->id}}" class="btn btn-primary">Register</a>
                        </td>
                    </tr>
                    @endforeach
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