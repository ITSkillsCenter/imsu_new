@extends('admin_student.master')

@section('title')
    My Classes || Online
@endsection

@section('main')
    @if(Request::routeIs('student-online-class.index'))
        <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('student-online-class.search') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="">Date:</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-12 mt-3">
                        <button class="btn btn-success btn-md float-right">search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @elseif(Request::routeIs('student-online-class.search'))
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Section</th>
                        <th>Faculty Name</th>
                        <th>Faculty Email</th>
                        <th>Date & Time</th>
                        <th>Details</th>
                    </thead>
                    <tbody>
                        @php
                            $main_date = \Carbon\Carbon::parse($date);
                        @endphp
                        
                        @foreach($classes as $item)
                            @php
                                $check_date = \Carbon\Carbon::parse($item->date_time);
                            @endphp
                            
                            @if($main_date->isSameDay($check_date))
                                <tr>
                                    <td>{{ $item->course->course_code }}</td>
                                    <td>{{ $item->course->course_name }}</td>
                                    <td>{{ $item->section }}</td>
                                    <td>{{ $item->faculty->name }}</td>
                                    <td>{{ $item->faculty->email }}</td>
                                    <td>{{ $item->date_time }}</td>
                                    <td>
                                        <a href="{{ $item->link }}">Join Class</a> <br>
                                        <span>Meeting ID: {{ $item->meeting_id }}</span> <br>
                                        <span>Meeting Password: {{ $item->meeting_password }}</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@section('extrascript')

@endsection