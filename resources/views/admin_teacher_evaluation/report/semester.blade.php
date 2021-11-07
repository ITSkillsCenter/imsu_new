@extends('layouts.master')

@section('title', 'Evaluation Report')
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
                    <h2>Evaluation Report > Semester List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {!! \Session::get('msg') !!}
                        </div>
                    @endif
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Semester</th>
                          <th>Total Registered</th>
                          <th>Total Evaluated</th>
                          <th>Evaluation List</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($semesters as $semester)
                          {{-- getting number of registered and evaluated --}}
                          @php
                              $department = App\Department::select('short_name')->where('id', $department_id)->first();
                              $registered = App\Registration::where('semester', $semester->title)
                                                            ->whereIn('reg_type',[1,2])
                                                            ->where('department', $department->short_name)
                                                            ->count();
                              $evaluated = App\TE_Main::select('student_id')
                                                        ->where('semester_id', $semester->title)
                                                        ->where('department', $department->short_name)
                                                        ->distinct()
                                                        ->count('student_id');
                          @endphp
                          {{-- ends --}}
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $semester->title }}</td>
                              <td>{{ $registered }}</td>
                              <td>{{ $evaluated }}</td>
                              <td>
                                <a href="{{ route('teacher-evaluation-report.faculties',['dept'=>$department_id,'sem'=>$semester->title]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> view</a>
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
