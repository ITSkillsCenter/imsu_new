@extends('layouts.master')

@section('title', 'Hostel clearance report')
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
                    <form action="{{route('department.clearance')}}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="row">
                         <div class="col-md-2">
                            <div class="item form-group">
                               <label class="control-label " for="department">Department <span class="required">*</span>
                               </label> 
                         <select class="form-control   has-feedback-left" name="department" id="department_id" required>
                             <option selected disable> --Select Department--</option>
                             @foreach($departments as $department)
                             <option value="{{$department->name}}">{{$department->name}}</option>
                             @endforeach
                           </select>
                               <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                               <span class="text-danger">{{ $errors->first('department') }}</span>
 
                            </div>
                         </div>
 
 
                         <div class="col-md-2">
                            <div class="item form-group">
                               <label class="control-label" for="levelTerm">Semester <span class="required">*</span>
                               </label>
                               <select class="form-control   has-feedback-left" name="semester" id="department_id" required>
                                <option selected disable> --Select Semester--</option>
                                @foreach($semesters as $semester)
                                <option value="{{$semester->Enrollment_Semester}}">{{$semester->Enrollment_Semester}}</option>
                                @endforeach
                              </select>
 
                            </div>
                         </div>
                         <div class="col-md-2">
                            <div class="item form-group">
                               <label class="control-label" for="levelTerm">Level Term <span class="required">*</span>
                               </label>
                               <select class="form-control   has-feedback-left" name="levelTerm" id="levelTerm" required>
                                <option selected disable> --Select One--</option>
                                <option value="l1t1">L1T1</option>
                                <option value="l1t2">L1T2</option>
                                <option value="l2t1">L2T1</option>
                                <option value="l2t2">L2T2</option>
                                <option value="l3t1">L3T1</option>
                                <option value="l3t2">L3T2</option>
                                <option value="l4t1">L4T1</option>
                                <option value="l4t2">L4T2</option>
                                
                              </select>
                              <span class="text-danger">{{ $errors->first('levelTerm') }}</span>
                            </div>
                         </div>
                         <div class="col-md-2">
                            <div class="item form-group">
                               <label class="control-label " for="department">Registration Type <span class="required">*</span>
                               </label> 
                               <select name="reg_type" class="form-control" for="department">
                                <option selected>--Select One--</option>
                                <option value="1">Regular/Term Wise</option>
                                <option value="2">Retake</option>
                                <option value="3">Improvement</option>
                                <option value="4">Backlog</option>
                            </select>
                               
                               <span class="text-danger">{{ $errors->first('reg_type') }}</span>
 
                            </div>
                         </div>
                         <div class="col-md-2">
                            <div class="item form-group"></div>
                           <button type="submit" style="margin-top: 16px;" class="btn btn-success btn-md btn-md">Get List</button>
                         </div>
                      </div>
                   </form>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Student Id</th>
                          <th>Full Name</th>
                          <th>Hostel Clearance</th>
                          <th>Registration For</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach($registrations as $reg)
                        <tr>
                          <td>{{$reg->student_id}}</td>
                          <td>{{$reg->Full_Name}}</td>   
                      <td>
                         <a onclick="return confirm('Make sure you are approving hostel clearance status!');"  id='{{$reg->id}}' href='{{URL::route('registration.clearance',[$reg->id,'type'=>2])}}'>
                          <?php
                          if($reg->hostel_clearance ==1){
                            echo '<b class="label label-success"> Approved by '.$reg->hostel_approved.'</b>';
                          }elseif($reg->hostel_clearance == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?>
                        </a>
                      </td>
                    <td>{{$reg->levelTerm}}</td>
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
   <!-- /validator -->
@endsection
