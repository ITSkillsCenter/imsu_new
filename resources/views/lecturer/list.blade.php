@extends('layouts.master')


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'All Lecturer','Title'=>'Lecturer'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
<h4 class="card-title">All User Information</h4>
</div> --}}
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            {{-- <h4 class="card-title">Create User</h4> --}}
                            {{-- <a href="{{ URL::Route('user.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Add User
                            </a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <table id="basic-datatables" class="display table table-striped table-hover" > --}}
                            <table id="datatable-user" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>

                                        <th>Email</th>
                                        <th>Courses</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @forelse ($lecturers as $lecturer)
                                <tr>
                                    <td>{{ $lecturer->user->name }}</td>
                                    <td>{{ $lecturer->user->email }}</td>
                                    <td>
                                        @foreach ($lecturer->lecturerCourses as $lecturerCourses)
                                            {{$lecturerCourses->course->course_name}},
                                        @endforeach
                                    </td>
                                   
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a href="{{route('course.assign')}}?lecturer_id={{base64_encode($lecturer->id) }}" class="btn btn-info btn-sm">
                                            Assign Course
                                        </a>
                                    </td>
                                  
                                </tr>
                                @empty
                                    
                                @endforelse

                                                      
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection



