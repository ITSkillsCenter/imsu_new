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
                    <h4 class="text-center text-danger">Session: {{ Helper::current_semester() }}</h4>
                  <div class="x_title">
                    @if (Request::routeIs('clear_report.index'))
                        <a href="{{ route('clear_report.type','outgoing') }}" class="btn btn-primary btn-sm">outgoing-students</a>
                        <a href="{{ route('clear_report.type','current') }}" class="btn btn-primary btn-sm">current-students</a>
                    @endif
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    @if (Request::routeIs('clear_report.type'))
                       <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                        <tr>
                          <th>Student Id</th>
                          <th>Semester</th>
                          
                          <th>Department Clearance</th>
                          <th>Hostel Clearance</th>
                          <th>Account Clearance</th>
                          <th>Transport Clearance</th>
                          <th>Library Clearance</th>
                          
                        </tr>
                      </thead>
                            <tbody>
                        
                              @foreach($registrations as $reg)
                                <tr>
                                  <td>{{$reg->student_id}}</td>
                                  <td>{{$reg->semester}}</td>
                                 
                                 
                                  
                                  
                              <td>
                                 <?php
                                    if($reg->dept_clearance ==1){
                                        echo '<b class="label label-success"> Approved by '.$reg->dept_approved.'</b>';
                                      }elseif($reg->dept_clearance == 0){
                                        echo '<b class="label label-danger"> Pending </b>';
                                    }
                                  ?>
                              </td>
                              <td>
                                <?php
                                 if($reg->hostel_clearance ==1){
                                   echo '<b class="label label-success"> Approved</b>';
                                 }elseif($reg->hostel_clearance == 0){
                                   echo '<b class="label label-danger"> Pending</b>';
                                 }
                                ?>
                             </td>
        
                             <td>
                              <?php
                               if($reg->account_clearance ==1){
                                 echo '<b class="label label-success"> Approved by '.$reg->account_approved.'</b>';
                               }elseif($reg->account_clearance == 0){
                                 echo '<b class="label label-danger"> Pending</b>';
                               }
                               ?>
                             </td>

                             <td>
                              <?php
                               if($reg->transport ==1){
                                 echo '<b class="label label-success"> Approved </b>';
                               }elseif($reg->transport == 0){
                                 echo '<b class="label label-danger"> Pending</b>';
                               }
                               ?>
                             </td>

                             <td>
                              <?php
                               if($reg->library ==1){
                                 echo '<b class="label label-success"> Approved </b>';
                               }elseif($reg->library == 0){
                                 echo '<b class="label label-danger"> Pending</b>';
                               }
                               ?>
                             </td>
                            </tr>
                              @endforeach
                            </tbody>
                        </table>
                    @endif
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
