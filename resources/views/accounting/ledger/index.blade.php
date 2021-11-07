@extends('layouts.master',['title'=>'Student | Ledger'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Student | Ledger','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Student Ledger Table</div>
                </div>
                <div class="card-header">
                  <a href="{{route('ledger.create')}}" class="btn btn-success"> +Payment Entry</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                           
                          <table  class="table table-striped table-bordered" id="datatable-buttons">
                            <thead>
                                <tr>
                                
                                <th>Student Name</th>
                                <th>Registration Number</th>
                                <th>Action</th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                @foreach ($students as $item)
                                <tr>
                                    <td>{{ $item->Registration_Number }}</td>
                                    <td>{{ $item->Full_Name }}</td>
                                    <td>
                                      <a href="{{ route('student.ledger',$item->Registration_Number) }}" class="btn btn-primary">student-ledger</a>
                                      
                                    </td>
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
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker.js')}}"></script>
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
         
          placeholder: "Select Particular",
          allowClear: true
        });
         $(".student").select2({
                placeholder: "Select Student ID",
                allowClear: true
            });
    });
   </script>
@endsection
