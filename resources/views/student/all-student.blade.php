@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'All Student','Title'=>'Student'])
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">All Student Information</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                {{-- <table id="basic-datatables" class="display table table-striped table-hover" > --}}
                  <table id="datatable-students" class="table table-striped table-bordered">
                    <thead>
                        <th>Matric Number</th>
                        <th>Registration Number</th>
                        <th>Full Name</th>
                        <th>Faculty</th>
                        <th>Department</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Marital Status</th>
                        <th>Blood Group</th>
                        <th>Religion</th>
                        <th>Nationality</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Student Mobile Number</th>
                        <th>Email Address</th>
                        <th>Guardian Name</th>
                        <th>Guardian Mobile Number</th>
                    </thead>
                    <tbody>
                      @foreach ($students as $item)
                      <tr>
                        <td>{{ $item->matric_number }}</td>
                        <td>{{ $item->registration_number }}</td>
                        <td>{{ $item->last_name . ' ' . $item->first_name . ' ' . $item->middle_name }}</td>
                        <td>{{ $item->faculty->name }}</td>
                        <td>{{ $item->department->name }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->marital_status }}</td>
                        <td>{{ $item->blood_group }}</td>
                        <td>{{ $item->religion }}</td>
                        <td>{{ $item->nationality }}</td>
                        <td>{{ $item->fathers_Name }}</td>
                        <td>{{ $item->mothers_Name }}</td>
                        <td>{{ $item->Student_Mobile_Number }}</td>
                        <td>{{ $item->Email_Address }}</td>
                        <td>{{ $item->guardian_name }}</td>
                        <td>{{ $item->guardian_phone }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
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
   <script>

     $(document).ready(function() {
     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-students").length) {
         $("#datatable-students").DataTable({
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


