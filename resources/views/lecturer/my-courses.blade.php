@extends('layouts.master')


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'All Courses Assigned','Title'=>'Courses'])
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
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Department</th>
                                        <th>Faculty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                        

                                @forelse ($lecturerCourses as $lecturerCourse)
                                <tr>
                                    <td>{{ $lecturerCourse->course->course_name }}</td>
                                    <td>{{ $lecturerCourse->course->course_code }}</td>
                                    <td>{{ $lecturerCourse->department->name }}</td>
                                    <td>{{ $lecturerCourse->faculty->name }}</td>
                                  

                                    <td>
                                        <!-- Button trigger modal -->
                                        <a href="{{route('plain-course-mark-sheet', $lecturerCourse->course->id)}}" class="btn btn-info btn-sm">
                                            Plain Mark Sheet
                                        </a>
                                        {{-- <a href="" class="btn btn-success btn-sm">
                                            Dynamic Mark Sheet
                                        </a> --}}

                                      
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

@section('extrascript')

<script>
    // DATA TABLE
    $(document).ready(function() {
        $('#datatable-user').DataTable({});
    });


    //DELETE USER
    $('.deleteForm').click(function(e) {

        const dataId = $(this).data("id")

        $.confirm({
            title: `Delete user? ${dataId}`,
            type: 'red',
            content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
            autoClose: 'cancelAction|8000',
            buttons: {
                deleteUser: {
                    text: 'delete user',
                    btnClass: 'btn-red',
                    action: function() {
                        $.alert('Deleted the user!');
                    }
                },
                cancelAction: function() {
                    // $.alert('action is canceled');
                }
            }
        });

    });
</script>

@endsection


