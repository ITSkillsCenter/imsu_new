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
                   
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3 class="text-center">BAIUST</h3>
                            <p class="text-center">Cumilla Cantonment, Cumilla</p>
                            <h3 class="text-center">Journal Voucher</h3>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12">
                               
                            <table  class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    
                                    <th>Particualar</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    </tr>
                                </thead>

                                
                                <tbody>
                                    <tr>
                                        <td>{{ $particular->particular }}</td>
                                        <td>{{ $particular->amount }}</td>
                                        <td></td>
                                    </tr>
                                    @php
                                       $sub_total=0; 
                                       $total=0; 
                                       $Credit_fee=0; 
                                    @endphp
                                    @foreach ($feeDetails as $item)
                                        <tr>  
                                            <td>{{ $item->feelists->fee_name }}</td>
                                            <td></td>
                                            <td style="text-decoration:@if($item->feelists->fee_type==2) line-through @else none @endif ;">{{ $item->feelists->amount }}</td>
                                            @if($item->feelists->fee_type==2)
                                            @php
                                                 $Credit_fee=$item->feelists->amount;
                                            @endphp
                                            @else
                                            @php
                                                 $sub_total+=$item->feelists->amount;
                                            @endphp
                                            @endif
                                        </tr>  
                                    @endforeach
                                    <tr>
                                        <td>Total Credit ({{ $totalCredit }} x {{ $Credit_fee }} = {{$Credit_fee *$totalCredit }})</td>
                                        <td></td>
                                        <td>{{$Credit_fee *$totalCredit }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tk {{ $particular->amount }}</td>
                                        <td>Tk {{ $Credit_fee*$totalCredit+ $sub_total}}</td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            </div>

                        </div>
                    </div>
                <!-- row end -->
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
