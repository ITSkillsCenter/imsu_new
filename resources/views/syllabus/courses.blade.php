@extends('layouts.master')

@section('title', 'Syllabus | Courses')

@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/sweetalert.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
          <div class="">
          <span class="text-info">Course Module v1.1 - Implemented On: 31 Dec 2020</span>

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                          <h4>Academic Course Syllabus - 
                            {{-- department list --}}
                              <a href="{{ route('course.syllabus') }}">
                                  <u>{{ $dept = \App\Department::where('short_name',$dept_id)->value('short_name') }}</u> / 
                              </a>
                              {{-- session list --}}
                              <a href="{{ route('syllabus.dept', $dept_id) }}">
                                  <u>{{ $semester = \App\Current_Semester_Running::where('id',$semester_id)->value('title') }}</u> / 
                              </a> 
                              {{-- level term list --}}
                              <a href="{{ route('syllabus.session', [$dept_id, $semester_id]) }}">
                                <u>{{ $level_term }}</u> / 
                              </a>
                          </h4>
                          <h4 class="text-primary">Total Credit: {{ $total_credit }}</h4>
                            <div class="clearfix"></div>
                            @permission('courseSyllabus-create')
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 15px">+ Add Courses</button>
                            @endpermission
                        </div>
                        <div class="x_content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Level - Term</th>
                                    <th>Database ID</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Course Credit</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($syllabus_courses as $item)
                                        <tr>
                                            <td>{{ $item->level_term }}</td>
                                            <td>{{ $item->course->id }}</td>
                                            <td>{{ $item->course->course_code }}</td>
                                              <td>{{ $item->course->course_name }}</td>
                                            <td>{{ $item->course->credit }}</td>
                                            <td>
                                                @if ($item->status == 'active')
                                                    <span class="text-success">{{ $item->status }}</span>
                                                @else
                                                    <span class="text-danger">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @permission('course-edit')
                                                <a href="{{ route('course.edit', $item->course_id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to edit this course?');"> <i class="fas fa-warning"></i> course edit</a>
                                                @endpermission

                                                @permission('syllabusCoursestatus-edit')
                                                <a href="{{ route('syllabus.edit', $item->id) }}" class="btn btn-warning"> <i class="fas fa-edit"></i> change-status</a>
                                                <a href="{{ route('syllabus.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fas fa-trash"></i> delete</a>
                                                @endpermission
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                <!-- row end -->
                </div>
            </div>
        <!-- /page content -->
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-content">
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">
                        <form action="{{ route('syllabus.post') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="form-row">
                              <div class="col-md-4">
                                <label for="">Department:</label>
                                <input type="text" class="form-control" name="department_id" value="{{ $dept_id }}" readonly>
                              </div>
                              <div class="col-md-4">
                                <label for="">Session:</label>
                                <input type="text" class="form-control" name="session_id" value="{{ $semester_id }}" readonly>
                              </div>
                              <div class="col-md-4">
                                <label for="">Level - Term:</label>
                                <input type="text" class="form-control" name="level_term" value="{{ $level_term }}" readonly>
                              </div>
                              <div class="col-md-12">
                                  <label for="">Courses:</label>
                                <select name="course_id[]" class="form-control select2" multiple="multiple" id="course">
                                    @foreach ($courses as $item)
                                        <option value="{{ $item->id }}">{{ $item->course_code }} - {{ $item->course_name }} - {{  $item->credit }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-md-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-success btn-md pull-right">submit</button>
                              </div>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
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
<script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
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
           buttons: [
             {
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
   <script>
    $(document).ready(function() {
        $('.select2').select2({
          dropdownParent: $(".bd-example-modal-lg"),
          placeholder: "Select Courses",
          allowClear: true
        });
    });
   </script>
@endsection
