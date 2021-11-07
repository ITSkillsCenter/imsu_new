@extends('layouts.master')

@section('title', 'Not | Evaluated')

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
            <div class="clearfix"></div>
            {{-- index form starts --}}
            @if (Request::routeIs('teacher-not-evaluation-report.index'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h4 class="text-info">Select Department and Semester</h4>
                            </div>
                            <div class="x_content">
                                <form action="{{ route('teacher-not-evaluation-report.search') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Semester:</label>
                                            <select name="semester" class="select2">
                                                @foreach ($semesters as $item)
                                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Department</label>
                                            <select name="department" class="select2">
                                                @foreach ($departments as $item)
                                                    <option value="{{ $item->short_name }}">{{ $item->short_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-success btn-md pull-right">search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                 
            @endif
            {{-- ends --}}
            <!-- row start -->
            @if (Request::routeIs('teacher-not-evaluation-report.search'))
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
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
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $item)
                                            <tr>
                                                <td>{{ $item->student_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    <!-- row end -->
                    </div>
                </div>  
            @endif
            
        <!-- /page content -->
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
          placeholder: "Select Particulars",
          allowClear: true
        });
    });
   </script>
@endsection
