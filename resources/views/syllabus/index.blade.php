@extends('layouts.master',['title'=>'Syllabus'])

@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Syllabus','Title'=>'Syllabus'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Syllabus</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- row start -->
                            @if (isset($departments))
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="card-header">
                                                <div class="d-flex align-items-center">
                                                    @role('super-admin')
                                                    <button class="btn btn-primary ml-auto btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#imoprtSyllabusModal"> <i class="fa fa-plus"></i>
                                                        &mnplus; Import Syllabus</a>
                                                        @endrole
                                                </div>
                                            </div>
                                            <div class="x_content">
                                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Department</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($departments as $department)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $department->short_name }}</td>
                                                                <td>
                                                                    <a href="{{ route('syllabus.dept', $department->short_name) }}"
                                                                        class="btn btn-info btn-sm"> <i
                                                                            class="fas fa-cog"></i> manage</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            @elseif(isset($semesters))
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h4>Academic Course Syllabus -
                                                    <a href="{{ route('course.syllabus') }}">
                                                        <u>{{ $dept = \App\Department::where('short_name', $dept_id)->value('short_name') }}</u>
                                                    </a>
                                                </h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Session</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($semesters as $semester)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $semester->title }}</td>
                                                                <td>
                                                                    <a href="{{ route('syllabus.session', [$dept_id, $semester->id]) }}"
                                                                        class="btn btn-info btn-sm"> <i
                                                                            class="fas fa-cog"></i> manage</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h4>Academic Course Syllabus -
                                                    <a href="{{ route('course.syllabus') }}">
                                                        <u>{{ $dept = \App\Department::where('short_name', $dept_id)->value('short_name') }}</u>
                                                        /
                                                    </a>
                                                    <a href="{{ route('syllabus.dept', $dept_id) }}">
                                                        <u>{{ $semester = \App\Current_Semester_Running::where('id', $semester_id)->value('title') }}</u>
                                                        /
                                                    </a>
                                                </h4>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">

                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            @endif
                            <!-- /page content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
<div class="modal fade" id="imoprtSyllabusModal" tabindex="-1" role="dialog" aria-labelledby="imoprtSyllabusModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Import Syllabus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form action="{{ route('syllabus.import') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Download Format and Instruction if necessary:</label> <br>
                            <a href="{{ asset('public/documents/Format.zip') }}" class="btn btn-info"
                                download>Download</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">File:</label>
                            <input type="file" name="file" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">submit</button>
                        </div>
                    </div>
                </div>
            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
			</div>
		</div>
	</div>

    
@endsection

@section('extrascript')
    <!-- dataTables -->
    {{-- <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script> --}}
    <script src="{{ URL::asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pdfmake.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script> --}}

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
