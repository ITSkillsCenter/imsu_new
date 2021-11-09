@extends('layouts.master',['title'=>'Carry Over'])


@section('content')
<a href="/admin/course/carry-over" class="btn btn-primary">Back</a>
<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'All Courses','Title'=>'Course'])
    <div class="row">
    
    <div class="col-lg-12">@include('homepage.flash_message')</div>
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-body">
                    @if(count($previousPending) > 0)
                    @php 
                        $std = Helper::get_student(base64_decode($matric));

                    @endphp
                    <div class="card-header">
                        <h4 class="card-title">Name: {{$std->Full_name}} | Matric Number: {{$std->matric_number}}</h4>
                    </div>
                    <div class="table-responsive">
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
                                        <a href="/admin/approve-carryover-course/{{$course->id}}" class="btn btn-success">Approve</a>
                                        <a href="/admin/reject-carryover-course/{{$course->id}}" class="btn btn-danger">Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No data found</p>
                    @endif


                </div>
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
</script>
<!-- /validator -->
@endsection