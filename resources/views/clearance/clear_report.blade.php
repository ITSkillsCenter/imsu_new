@extends('layouts.master')

@section('title', 'All Clearance Report')
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
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  <a href="{{ route('clear_report.index') }}" class="btn btn-info">Back</a>
                   <h3 class="text-center">Clearance Certificate</h3>
                   <div class="row">
                   <h4>Certified that there is nothing outstanding against Mr./Ms. <span class="text-info">{{$student->Full_Name}}</span></h4>
                   <h4>Student ID#: <span  class="text-danger">{{ $student->Registration_Number}}</span></h4>
                   </div>
                   (Please complete the From within 2 days of receiving it.)

                   <table class="table">
                     <thead>
                       <tr>
                        <th width="50%">Clearance</th>
                        <th width="50%">Status/Remarks</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                        <td>Hall/Hostel</td>
                        <td>
                          <?php
                          if($student->hostel ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($student->hostel == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?>
                          </td>
                       </tr>
                       <tr>
                        <td>Transportation</td>
                        <td> <?php
                          if($student->transport ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($student->transport == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?></td>
                       </tr>
                       <tr>
                        <td>Canteen</td>
                        <td> <?php
                          if($student->canteen ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($student->canteen == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?></td>
                       </tr>
                       <tr>
                        <td>Library</td>
                        <td> <?php
                          if($student->library ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($student->library == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?></td>
                       </tr>
                       <tr>
                        <td>Department</td>
                        <td> <?php
                          if($student->department ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($student->department == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?></td>
                       </tr>
                       <tr>
                        <td>Treasurer Branch</td>
                        <td> <?php
                          if($student->treasurer ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($student->treasurer == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?>
                        <br>
                        <br>
                        <br>
                        Remarks:{{ $student->tb_remarks }}  
                        </td>
                       </tr>
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
