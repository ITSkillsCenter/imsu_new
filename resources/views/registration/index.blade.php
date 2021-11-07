@extends('layouts.master')

@section('title', 'Registration List')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Registration<small> Registration basic information.</small></h2>
                      <hr>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Registration</a></li>
                            @if(isset($dept))
                            <li class="breadcrumb-item"><a href="#">{{ $dept }}</a></li>
                            @endif
                            @if(isset($semester))
                            <li class="breadcrumb-item active" aria-current="page">{{ $semester }}</li>
                            @endif
                          </ol>
                        </nav>
                      <div class="clearfix"></div>
                      @if(count($departments)>0)
                    @foreach ($departments as $d)
                  <a href="{{ route('registration.department_reg',$d->department) }}" class="btn @if($d->department==$dept) btn-danger @endif btn-info">{{$d->department}}</a>
                    @endforeach
                    @endif
                      <div class="clearfix"></div>
                      <hr>
                      @if(count($semesters)>0)
                      @foreach ($semesters as $s)
                  <a href="{{ route('registration.semester_reg',['dept'=>$dept,'semester'=>$s->semester]) }}" class="btn  @if($s->semester==$semester)  btn-danger @endif ">{{$s->semester}}</a>
                    @endforeach
                    
                     <hr>
                    
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>1]) }}"
                  class="btn btn-sm btn-success">Regular</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>2]) }}"
                  class="btn btn-sm btn-primary">Term-Repeat</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>3]) }}"
                  class="btn btn-sm btn-info">Referred</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>4]) }}"
                  class="btn btn-sm btn-danger">Improvement</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>5]) }}"
                  class="btn btn-sm btn-warning">Backlog</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>6]) }}"
                  class="btn btn-sm btn-success">Retake</a>
                    @endif
                  </div>

                  <div class="x_content">
                    {{-- error portion --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- error portion ends --}}
                    @if(count($registrations)>0)
                    @permission('registration-create')
                    <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#manual_reg">Manual Registration</button>
                    @endpermission
                  <h3 class="text-center"></h3>
                    
                    @endif
                  </div>
                </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
          {{-- fetching data for manual registration --}}
            @php
                $students = \App\StudentInfo::where('Program',$dept)
                                              ->where('Current_status','!=','graduate')
                                              ->orderBy('id', 'ASC')
                                              ->get();
                $courses = \App\Course::where('Program',$dept)->get();
            @endphp
          {{-- data fetching ends --}}

          {{-- manual registration form --}}
          <div class="modal fade" id="manual_reg" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Perform a Manual Registration</h4>
                </div>
                <div class="modal-body">
                  {{-- form starts --}}
                  <form action="{{route('manual.registration')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label>Select Student ID: </label>
                      <select name="sid" class="form-control select2" >
                        <option value="" selected disabled>Please select student ID......</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->Registration_Number }}">{{ $std->Registration_Number.' - '.$std->Full_Name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Session:</label>
                      <select name="semester" class="form-control" for="inputPassword2">
                            <option value="{{$active_semester}}">{{$active_semester}}</option>
                            <option value="Fall-2020">Fall-2020</option>
                      </select>
                      @if ($errors->has('semester'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('semester') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label>Registration Type:</label>
                      <select name="reg_type" class="form-control" for="inputPassword2">
                        <option  value="1">Regular/Term-Wise</option>
                        <option  value="2">Term-Repeat</option>
                        <option  value="3">Referred</option>
                        <option  value="4">Improvement</option>
                        <option  value="5">Backlog</option>
                        <option  value="6">Retake</option>
                      </select>
                      @if ($errors->has('reg_type'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('reg_type') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label>Level Term:</label>
                      <select name="level" id="level" class="form-control" for="inputPassword2">
                        <option selected value="">--Select one--</option>
                        <option value="l1t1">Level-1 Term-1</option>
                        <option value="l1t2">Level-1 Term-2</option>
                        <option value="l2t1">Level-2 Term-1</option>
                        <option value="l2t2">Level-2 Term-2</option>
                        <option value="l3t1">Level-3 Term-1</option>
                        <option value="l3t2">Level-3 Term-2</option>
                        <option value="l4t1">Level-4 Term-1</option>
                        <option value="l4t2">Level-4 Term-2</option> 
                      </select>

                      @if ($errors->has('level'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label>Courses:</label>
                      <select name="course_id[]" class="form-control select2" multiple="multiple" id="course" >
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_code.' - '.$course->course_name }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('level'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('course_id') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-md btn-success pull-right">Submit</button>
                    </div>

                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
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

   <script>

     $(document).ready(function() {

     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-buttons").length) {
         $("#datatable-buttons").DataTable({
          "pageLength": 100,
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
   <script>
    $(document).ready(function() {
        $('.select2').select2({
          dropdownParent: $("#manual_reg"),
          placeholder: "Select Courses",
          allowClear: true
        });
    });
   </script>
@endsection
