@extends('layouts.master')

@section('title', 'Single-Student|Marks')
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
                    <h2>Marks<small>Single student all marks information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_panel">
                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{route('mark.sheet')}}">
                    {{@csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Please Enter Roll: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="file" type="text" class="form-control col-md-7 col-xs-12"  name="student_id" value="{{old('student_id')}}" placeholder="ex: 1101031" required="required">
                            <span class="text-danger">{{ $errors->first('student_id') }}</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Find</i></button>
                        </div>
                      </div>
                      
                    </form>

                    <div class="clearfix"></div>
                  </div>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_panel">
                    <div class="x_title">
                      <h3>Student Name: {{ $name }}</h3>
                      <h4>CGPA:<b> {{ $total_cgpa }}</b> for <b> {{ $creditsum }} Credits</h4>
  
                      <div class="clearfix"></div>
                    </div>
                  @if(count($marks)>0)
                  <div class="x_content">
                     <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Registration Number</th>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Semester</th>
                          <th>Level Term</th>
                          <th>Credit</th>
                          <th>Point</th>
                          <th>Grade</th>
                          <th>Course Status</th>
                          @permission('mark-edit')
                          <th>Actions</th>
                           @endpermission
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($marks as $mark)
                        <tr>
                          <td>{{$mark->Registration_Number}}</td>
                          <td>{{$mark->course_code}}</td>
                          <td>{{$mark->course_name}}</td>
                          <td>{{$mark->semester}}</td>
                          <td>{{$mark->level}}</td>
                         
                          <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
                          <td>
                          {{number_format((float)$credit = $mark->grade_point, 2, '.', '')}}</td>
                          <td align="center">{{$mark->grade_letter}}</td>
                        
                          <td>{{$mark->course_status}}</td>
                          @permission('mark-edit')
                          <td>
                         <a title='Update' class='btn btn-info btn-xs btnUpdate' id='' href="{{route('mark.edit',$mark->id)}}"> <i class="fa fa-check icon-white"></i></a>
                         <form class="deleteForm" method="POST" action="{{route('mark.destroy',$mark->id)}}">
                           {{csrf_field()}} 
                            {{ method_field('DELETE') }} 
                         <button type="submit" class='btn btn-danger btn-xs btnDelete'  onclick="return confirm('Are you sure want to delete this?');"> <i class="fa fa-trash icon-white"></i></button>
                       </form>
                      </td>
                      @endpermission
                        </tr>
                    @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                 @endif
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
