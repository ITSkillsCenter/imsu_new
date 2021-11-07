@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Credit Transfer','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">  
                       <h2>Student List<small> Credit Transfer Student Basic Information.</small></h2></div>
                </div>

                <div class="card-header">
                  <div class="d-flex align-items-center">
                    {{-- <h4 class="card-title">Create User</h4> --}}
                        {{-- <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal" data-target=".create-semester-modal">+ Add New</button> --}}
                        <a class="btn btn-primary ml-auto btn-sm" href="{{ route('transfer.create') }}">+Add Student</a>
                  </div>
                </div>
                <div class="card-body">
                  @if(count($students)>0)
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <td>Student ID</td>
                          <td>University Name </td>
                          <td>Start Semester (BAIUST)</td>
                          <td>End Semester (BAIUST)</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($students as $student)
                         <tr>
                           <td>{{ $student->student_id }}</td>
                           <td>{{ $student->university_name }}</td>
                           <td>{{ $student->start_semester }}</td>
                           <td>{{ $student->end_semester }}</td>
                           <td><a href="{{ route('transfer.edit',$student->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> Edit</a></td>
                         </tr> 
                        @endforeach
                      </tbody>
                    </table>
									</div>
                  
                  @endif
                   
                </div>
                
            </div>
        </div>
    </div>
   
 
</div>
@endsection


@section('extrascript')
<!-- dataTables -->
{{-- <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script> --}}
{{-- <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script> --}}
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