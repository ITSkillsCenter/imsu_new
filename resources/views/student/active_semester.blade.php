@extends('layouts.master')

@section('title', 'Students')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            

              <div class="clearfix"></div>
              <div class="row">
                @php
                    $spring2020 = \App\StudentInfo::where('Enrollment_Semester',$active_semester)->latest()->get();
                @endphp
  <h3 class="text-center">Total : {{ count($spring2020) }}</h3>
<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Photo</th>
        <th>Full Name</th>
        <th>Registration Number</th>
        <th>Date of Birth</th>
        <th>Program</th>
        <th>Level Term</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @if(count($spring2020)>0)
    @foreach($spring2020 as $student)
      <tr>
        <td>

            <img src="{{asset('/').$student->Photo}}" alt="photo" class="" width="80px" height="70px">
      </td>
      <td>{{$student->Registration_Number}}</td>
        <td>{{$student->Full_Name}} </td>
        <td>{{$student->Date_of_Birth }}</td>
        <td>{{$student->Program}}</td>
        <td>{{$student->Current_semester}}</td>
        <td>{{$student->Current_status}}</td>
        <td>
          @php
$sid = Crypt::encrypt($student->Registration_Number);
@endphp
       <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$sid)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
       <a title='Download' class='btn btn-success btn-xs' href='{{URL::route('studentinfo.download',$sid)}}'> <i class="fa fa-download icon-white"></i></a>
       <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$sid)}}'> <i class="fa fa-check icon-white"></i></a>
       
       <a href="{{ route('studentinfo.delete',$student->id) }}"><i class="fa fa-trash icon-white"></i></a>
    </td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
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
