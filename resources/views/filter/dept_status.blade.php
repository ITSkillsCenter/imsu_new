
@extends('layouts.master')

@section('title', 'Students')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<style>
#rcorners1 {
border-radius: 32px;
background: #EA3079;
padding: 10px;
width: 100px;
height: 75px;
color: white;
}  
</style>

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
                    <h2>Students<small> Student information.</small></h2>

                    @php $statuses=DB::table('student_infos')->select('Current_status')->distinct()->get();  @endphp
                    <div class="clearfix"></div>
                    <div class="row">
                      <div class="col-md-3">
                        @foreach ($statuses as $status)
                            <a href="{{ route('student.report_dept_status',[$dept,$status->Current_status]) }}" class="btn btn-info">{{ $status->Current_status }}</a>
                        @endforeach
                        </div>
                  </div>
                  </div>
                  <div class="x_content">
                  	<a href="{{URL::to('admin/studentinfo')}}" class="btn btn-lg btn-info"> <i class="fas fa-hand-point-left"></i>Back</a>
                    <center>
                      <div id="rcorners1">
                        <p>Total-{{$status}}</p>
                        <h3>{{$total}}</h3>
                      </div>
                      <p>Students From {{$dept}}</p>
                    </center>
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Full Name</th>
                          <th>Registration Number</th>
                          <th>Batch No</th>
                          <th>Program</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($students)>0)
                      @foreach($students as $student)
                        <tr>
                          <td>

                              <img src="{{asset('/').$student->Photo}}" alt="photo" class="" width="80px" height="70px">

                        </td>
                          <td>{{$student->Full_Name}} </td>
                          <td>{{$student->Registration_Number}}</td>
                          <td>{{$student->Batch}}</td>
                          <td>{{$student->Program}}</td>
                          <td>
                            @php
            $id = Crypt::encrypt($student->Registration_Number);
            @endphp
                         <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
                         <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fa fa-check icon-white"></i></a>
                         <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                           <input name="_method" type="hidden" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <button type="submit" class='btn btn-danger btn-xs btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                       </form>
                      </td>
                        </tr>
                        @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
                  </div>
                </div>
              <!-- row end -->
                  </div>
              <div class="clearfix"></div>
		</div>
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
       $(".select2_single").select2({
           placeholder: "Select Department",
            allowClear: true
       });
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
    @if($selectDep!="" && count($students)==0)
    new PNotify({
          title: "Data Fetch",
          text: 'There are no student in this department!',
          styling: 'bootstrap3'
    });
    @endif
   });
   </script>
   <!-- /validator -->
@endsection
