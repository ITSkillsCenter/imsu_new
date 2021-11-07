@extends('layouts.master')

@section('title', 'Online Class - All')
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
                        <h2>Online Classes<small> all class information.</small></h2>
                        <div class="clearfix"></div>
                    </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Session</th>
                          <th>Date</th>
                          <th>Duration</th>
                          <th>Course Code</th>
                          <th>Course Title</th>
                          <th>Department</th>
                          <th>Level-Term</th>
                          <th>Section</th>
                          <th>Class Credentials</th>
                          <th>Remarks</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach($all_classes as $item)
                        <tr>
                          <td>{{$item->session}}</td>
                          <td>{{$item->date_time}}</td>
                          <td>{{$item->duration}} hrs.</td>
                          <td>{{$item->course->course_code}}</td>
                          <td>{{$item->course->course_name}}</td>
                          <td>{{$item->class_for}}</td>
                          <td>{{$item->level_term}}</td>
                          <td>{{$item->section}}</td>
                          <td>
                              <a href="{{ $item->link }}" target="_blank"><u>Join Class</u></a> <br>
                              <span>Meeting ID: <b>{{$item->meeting_id}}</b></span> <br>
                              <span>Meeting Password: <b>{{$item->meeting_password}}</b></span>
                          </td>
                          <td>{{ $item->remarks }}</td>
                          <td>
                              <a href="{{ route('online-class.edit', $item->id) }}" class="btn btn-warning btn-sm">edit</a>
                              <a href="{{ route('online-class.destroy', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete the class?');">delete</a>
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
