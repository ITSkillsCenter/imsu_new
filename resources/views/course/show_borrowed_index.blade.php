@extends('layouts.master',['title'=>'All Courses'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'All Courses','Title'=>'Course'])
    <div class="row">
        <!-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Select Department to Borrow Courses</label>
                                <select name="dept" class="form-control" required>
                                    <option value="">--Select Department--</option>
                                    @foreach ($departments as $d)
                                    <option value="{{$d->id}}" {{$dept==$d->id ? 'selected' : ''}}>{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ __('Level') }}</label>
                                <select name="program" class="form-control" required>
                                    <option value="">--Select Level--</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                    <option value="600">600</option>
                                </select>
                            </div>
                        </div>
                        @csrf
                        <div div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="mt-4 btn btn-md btn-primary"><i class="fa fa-check"></i> Borrow Course </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Borrowed Courses found in {{$department->name}} for {{$sel_prog->name}}</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Borrow
                        </button>
                    </div>

                    <div class="mt-5 table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Database Id</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Type</th>
                                    <th>Credit</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->course_code}}</td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->type}}</td>
                                    <td>{{$course->unit}}</td>
                                    <td>{{$course->remarks}}</td>
                                    <td>
                                        @if($course->status==1)
                                        <span class='btn btn-success btn-xs'> <i class="fa fa-ok icon-white"></i> Active</span>
                                        @else
                                        <span class='btn btn-danger btn-xs'> <i class="glyphicon fa fa-remove icon-white"></i> Inactive</span>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @permission('course-delete')
                                            <form class="deleteForm" method="POST" action="{{URL::route('course.destroy',$course->id)}}">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class='btn btn-danger btn-xs btnDelete' onclick="return confirm('Are you sure want to delete this?');"> Delete </button>
                                            </form>
                                            @endpermission
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Borrow from</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Select Department to Borrow Courses</label>
                        <select id="dept_sel" class="form-control" required>
                            <option value="">--Select Department--</option>
                            @foreach ($departments as $d)
                            <option value="{{$d->id}}" {{$dept==$d->id ? 'selected' : ''}}>{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ __('Level') }}</label>
                        <select id="level_sel" class="form-control" required>
                            <option value="">--Select Level--</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                        </select>
                        <input type="hidden" id="program_sel" value="{{$sel_prog->id}}">
                    </div>
                </div>
                @csrf
                <div div class="col-md-3">
                    <div class="form-group">
                        <button type="button" id="fetch_course" class="mt-4 btn btn-md btn-primary"><i class="fa fa-check"></i> Fetch Course </button>
                    </div>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Type</th>
                                <th>Credit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="listc">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extrascript')
<!-- dataTables -->
<script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
{{-- <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script> --}}
<script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function() {

        //datatables code
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    "pageLength": 50,
                    responsive: true,
                    dom: "Bfrtip",
                    buttons: [{
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        TableManageButtons.init();

    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#fetch_course').click(function(){
        let program = $('#program_sel').val()
        let dept_id = $('#dept_sel').find(":selected").val()
        let level = $('#level_sel').find(":selected").val()
        if(program !== undefined && level !== undefined && program !== '' && level !== ''){
            $.post('/get_courses_dept_level',{program, level, dept_id}).done(function(response){
                console.log(response)
                $('#listc').html()
                response.map((course)=>{
                    $('#listc').append(`
                    <tr>
                        <td>${course.course_code}</td>
                        <td>${course.course_name}</td>
                        <td>${course.type}</td>
                        <td>${course.unit}</td>
                        <td><a href="/admin/borrow-course/{{$department->id}}/{{$sel_prog->id}}/${course.id}" class="btn btn-sm btn-primary">Borrow</a></td>
                        
                    </tr>
                    `
                    )
                })
            });
        }else{
            alert('All fields are required')
        }
        // console.log(program, level)
    })
</script>
<!-- /validator -->
@endsection