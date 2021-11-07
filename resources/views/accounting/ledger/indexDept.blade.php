@extends('layouts.master')

@section('title', 'Student | Ledger')

@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/sweetalert.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
          <div class="">
          <span class="text-info">Accounts Module v1.1 - Implemented On: 31 Dec 2020</span>

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
                <div class="x_content">
                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Date Picker</button>
                </div>
                @if (isset($from))
                    
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                        <!-- Trigger the modal with a button -->
                        
                        <p class="text-center">Students Acc. Receivable</p>
                            <h3 class="text-center">BAIUST</h3>
                            <p class="text-center">{{ $from }} to {{ $to }}</p>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12">
                               
                            <table  class="table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                    
                                    <th>Particulars</th>
                                    <th>Opening Balance</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Closing Balance</th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td><a href="#">Dept. of Business Administration</a></td>
                                        <td>{{ $opening_bal }}</td>
                                        <td>{{ $debit }}</td>
                                        <td>{{ $credit }}</td>
                                        <td>{{ $opening_bal+$debit-$credit }}</td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">Sc. & Hum</a></td>
                                        <td>{{ $opening_bal }}</td>
                                        <td>{{ $debit }}</td>
                                        <td>{{ $credit }}</td>
                                        <td>{{ $opening_bal+$debit-$credit }}</td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">Secience Faculty</a></td>
                                        <td>{{ $opening_bal }}</td>
                                        <td>{{ $debit }}</td>
                                        <td>{{ $credit }}</td>
                                        <td>{{ $opening_bal+$debit-$credit }}</td>
                                    </tr>
                                
                                <tbody>
                                   
                                </tbody>
                                
                            </table>
                            </div>

                        </div>
                    </div>
                <!-- row end -->
                </div>
                @endif
            </div>
              <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Date Range Select Form</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ route('ledger.indexReport') }}" role="form" method="POST">
            @csrf
                <div class="form-group">
                    
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="inputKey" class="col-md-1 control-label">From</label>
                            <div class="col-md-4">
                                <input type="date" name="from" class="form-control" id="inputKey" >
                            </div>
                            <label for="inputValue" class="col-md-1 control-label">To</label>
                            <div class="col-md-4">
                                <input type="date" name="to" class="form-control" value="{{$today->format('d/m/Y')}}" id="inputValue" >
                            </div>
                            <div class="col-md-2">
                                <button type="submit"   class="btn btn-info" >Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

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
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker.js')}}"></script>
{{-- <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script> --}}
   <script>

     $(document).ready(function() {
        $(".student").select2({
                placeholder: "Select Student ID",
                allowClear: true
            });
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
   
@endsection
