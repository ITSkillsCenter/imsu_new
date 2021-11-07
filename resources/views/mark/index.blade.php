@extends('layouts.master')

@section('title', 'Upload|Marks')
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
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Marks<small> All Marks information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Registration Number</th>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Credit</th>
                          <th>Point</th>
                          <th>Grade</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($marks as $mark)
                        <tr>
                          <td>{{$mark->Registration_Number}}</td>
                          <td>{{$mark->course_code}}</td>
                          
                          <td>{{$mark->course_name}}</td>
                          <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
                          <td>{{number_format((float)$credit = $mark->grade_point, 2, '.', '')}}</td>
                          <td>{{$mark->grade_letter}}</td>
                          <td>
                            @permission('mark-edit')
                            <a title='Update' class='btn btn-info btn-xs btnUpdate' id='' href="{{route('mark.edit',$mark->id)}}"> <i class="fa fa-check icon-white"></i></a>
                            @endpermission

                            @permission('mark-delete')
                            <form class="deleteForm" method="POST" action="{{route('mark.destroy',$mark->id)}}">
                            @csrf
                            @method("DELETE")
                              <button type="submit" class='btn btn-danger btn-xs btnDelete'  onclick="return confirm('Are you sure want to delete this?');"> <i class="fa fa-trash icon-white"></i></button>
                            </form>
                            @endpermission
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
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>

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
