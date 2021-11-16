@extends('layouts.master',['title'=>'Carry Over'])


@section('content')
<a href="/admin/course/programme/{{Helper::get_department($programme->dept_id)->id}}" class="btn btn-primary">Back</a>
<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'All Courses','Title'=>'Course'])
    <div class="row">

        <div class="col-lg-12">@include('homepage.flash_message')</div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                   
                    <div class="card-header">
                        <h4 class="card-title">Specialization > {{$programme->name}} > {{Helper::get_department($programme->dept_id)->name}}</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Add new Specialization
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                @if(count($specialization)>0)
                                @php $sn = 1; $count = 0; @endphp
                                @foreach($specialization as $course)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>
                                        <!-- <a href="/admin/course/specialization/{{$course->id}}/specialization" class="btn btn-success">Approve</a> -->
                                        <a href="/admin/remove-specialization/{{$course->id}}" class="btn btn-danger">Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                   


                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new specialization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name of specialization</label>
                    <input type="text" class="form-control" name="name" placeholder="Name of specialization" value="">
                    <input type="hidden" class="form-control" name="programme_id" value="{{$programme->id}}">
                    <input type="hidden" class="form-control" name="dept_id" value="{{Helper::get_department($programme->dept_id)->id}}"> 
                    @csrf
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
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