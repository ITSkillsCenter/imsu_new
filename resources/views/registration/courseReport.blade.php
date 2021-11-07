@extends('layouts.master')

@section('title', 'Course wise registered students list')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
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
                        <h2>Registration<small> session and course wise students list</small></h2>
    
                        <div class="clearfix"></div>
                      </div>
    
                      <div class="x_content">
                        <div class="row">
                        <form action="{{route('registration.course')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="item form-group">
                                            <label class="control-label " for="department">Semester <span class="required">*</span>
                                            </label>
                                            <select class="form-control   has-feedback-left" name="semester" id="semester">
                                                <option selected value="{{$active_semester}}"> {{$active_semester}}</option>
                                            </select>
                                            <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="item form-group">
                                            <label class="control-label " for="department">Course  <span class="required">*</span>
                                            </label>
                                            <select class="form-control subject  has-feedback-left" name="course_id" id="course_id">
                                                <option selected disable> --Select Course--</option>
                                                @foreach($courses as $course)
                                                <option value="{{$course->id}}">{{$course->course_code}}-{{$course->course_name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                            <span class="text-danger">{{ $errors->first('course_id') }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="item form-group">
                                            <br>
                                            
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                             </div>
                            </form>
                        </div>
                        @if(count($students))
                        <br>
                    <h2 class="text-center">Total:{{count($students)}}</h2>
                    <h4 class="text-center">Students are registered in [{{$singleCourse->course_code}}-{{$singleCourse->course_name}}] course for {{$semester}}</h4>
                        <br>
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Serial No- [ {{$singleCourse->course_code}} ]</th>
                                            <th>Registration Number</th>
                                            <th>Full Name</th>
                                            <th>Registration Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$student->student_id}}</td>
                                            <td>{{$student->Full_Name}}</td>
                                            <td> <?php if($student->reg_type==1){
                                                echo "<b class='label label-success'>Regular</b>";
                                            }elseif($student->reg_type==2){
                                                echo "<b class='label label-primary'>Term Repeat</b>";
                                            }
                                            
                                            ?></td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                               </table>
                            </div>
                        </div>
                        @endif
                    </div>
                  </div>
                </div>
                  <!-- row end -->
                <div class="clearfix"></div>
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
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>

   <script>

     $(document).ready(function() {
        $(".subject").select2({
                placeholder: "Select Course",
                allowClear: true
            });

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
   <!-- /validator -->
@endsection
