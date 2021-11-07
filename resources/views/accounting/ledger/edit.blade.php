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
                           <h3>Journal Edit Form</h3>
                        </div>
                        <div class="x_content">
                            <form  action="{{ route('ledger.update',$rd->id) }}" method="post">
                                   @csrf
                                   @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Date(*)</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="date" name="date" value="{{$today->format('Y-m-d')}}"  required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Student ID(*)</label>
                                            <div class="input-group">
                                                
                                                <select class="form-control student" name="student_id" >
                                                    <option></option>
                                                    @foreach ($students as $item)
                                                        <option @if($rd->student_id==$item->Registration_Number) selected @endif value="{{ $item->Registration_Number }}" >{{ $item->Registration_Number }}-{{ $item->Full_Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-danger">Select Type First(*)</label>
                                            <div class="input-group">
                                                <select class="form-control" name="type" >
                                                    @if(!isset($student_id))
                                                    <option value="payment"> Payment</option>
                                                    <option value="receipt"> Receipt</option>
                                                    @else
                                                    <option value="receipt"> Receipt</option>
                                                     @endif  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="input-group">
                                                <button class="btn btn-info" type="submit"><i class="fas fa-sync"></i> Update</button>
                                            </div>
                                        </div></div>
                                </div>
                               <div class="row">
                                    
                                    <div class="col-md-3">
      
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Particular(*)</label>
                                            <div class="input-group">
                                                <select class="form-control select2" name="fee_id_1" >
                                                    <option></option>
                                                        @foreach ($fees as $item)
                                                        <option @if($ld[0]->fee_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->fee_name }}-{{$item->account_type}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Debit Amount(*)</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $ld[0]->amount }}" name="amount_1" placeholder="Debit Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label>Remarks</label>
                                    <textarea class="form-control" name="remarks_1"></textarea>
                                    </div>
                                </div>
                                 <div class="row">
                                    
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Particular(*)</label>
                                            <div class="input-group">
                                                <select class="form-control select2" name="fee_id_2" >
                                                    <option></option>
                                                        @foreach ($fees as $item)
                                                        <option @if($ld[1]->fee_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->fee_name }}-{{$item->account_type}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Credit Amount(*)</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $ld[1]->amount }}" name="amount_2" placeholder="Credit Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Remarks</label>
                                    <textarea class="form-control" name="remarks_2"></textarea>
                                    </div>
                                </div>
                            </form>
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
