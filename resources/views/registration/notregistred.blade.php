@extends('layouts.master')

@section('title', 'Not Registered Students List')
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
                        <h2>Registration<small> session and department wise not Registered students list</small></h2>
    
                        <div class="clearfix"></div>
                      </div>
    
                      <div class="x_content">
                        <div class="row">
                        <form action="{{route('registration.notyet')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <label class="control-label " for="department">Semester <span class="required">*</span>
                                            </label>
                                            <select class="form-control   has-feedback-left" name="semester" id="semester">
                                                <option selected value="{{$active_semester}}">{{$active_semester}}</option>
                                            </select>
                                            <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <label class="control-label " for="department">Department  <span class="required">*</span>
                                            </label>
                                            <select class="form-control subject  has-feedback-left" name="department" id="course_id">
                                                
                                                <option selected value="CSE"> CSE</option>
                                                <option value="EEE"> EEE</option>
                                                <option  value="CE"> CE</option>
                                                <option  value="BBA"> BBA</option>
                                                <option  value="English"> ENGLISH</option>
                                                <option  value="LLB"> LLB</option>
                                                
                                            </select>
                                            <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                            <span class="text-danger">{{ $errors->first('course_id') }}</span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="item form-group">
                                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                                        </div>
                                    </div>
                             </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3 class="text-success"> Session: {{ $request->semester }}</h3>
                                <h3 class="text-success"> Department: {{ $request->department }}</h3>
                                <h3 class="text-success"> Total: {{ count($students) }}</h3>
                            </div>
                            <div class="x_content">
                            
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <th>Student ID</th>
                                        <th>Level-Term</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $item)
                                            <tr>
                                                <td>{{ $item->student_id }}</td>
                                                @php
                                                    $this_student = App\StudentInfo::select('Current_Semester')->where('Registration_Number', $item->student_id)->first();
                                                @endphp
                                                <td>{{ $this_student->Current_Semester }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    <!-- row end -->
                    </div>
                        </div>  
                        
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
