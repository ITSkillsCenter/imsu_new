@extends('layouts.master',['title'=>'Student'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Student | Ledger','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Student | Ledger</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                     
                          <ul class="list-group list-group-bordered">
                            <li class="list-group-item ">Student ID: <strong>{{ $student->Registration_Number }}</strong></li>
                            <li class="list-group-item">Name: <strong>{{ $student->Full_Name }}</strong></li>
                            <li class="list-group-item">Department: <strong>{{ $student->Program }}</strong></li>
                            <li class="list-group-item">Level Term(Current): <strong>{{ $student->Current_semester }}</strong></li>
                            <li class="list-group-item">Student Ledger(All)</li>
                            
                          </ul>
                          &nbsp;
                          <table  class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                
                                <th>Date</th>
                                <th>Particulars</th>

                                <th>Debit(Dr)</th>
                                <th>Credit(Cr)</th>
                                <th>Closing Balance</th>
                                <th>Remarks</th>
                                <th>Action</th>
                                
                                </tr>
                            </thead>

                            
                            <tbody>
                               @php
                                   $total_Dr=0;
                                   $total_Cr=0;
                               @endphp
                                @foreach ($particulars as $fee)
                                    
                                        <tr>
                                            
                                            <td>{{ $fee->date }}</td>
                                            <td>@if ($fee->is_semester=='1')
                                                <a href="{{ route('student.journal',$fee->id) }}">{{ $fee->particular }}</a>
                                                @else
                                                    {{ $fee->particular }}
                                                @endif
                                            </td>
                                        @if ($fee->account_type=='Dr')
                                            <td>{{ $fee->amount }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$fee->remarks}}</td>
                                            @php
                                                $total_Dr+=$fee->amount;
                                            @endphp
                                        @endif
                                        @if ($fee->account_type=='Cr')
                                            <td></td>
                                            <td>{{$Cr= $fee->amount }}</td>
                                            <td></td>
                                            <td>{{$fee->remarks}}</td>
                                            @php
                                            $total_Cr+=$fee->amount;
                                            @endphp
                                        @endif
                                            <td>
                                            @permission('ledger-edit')
                                             <a class="btn btn-info" href="{{route('ledger.edit',$fee->id)}}"> <i class="fa fa-edit"></i> Edit</a>||
                                            @endpermission
                                            @permission('ledger-delete')
                                            <a class="btn btn-danger" href="{{ route('ledger.delete',$fee->id) }}" 
                                            onclick="return confirm('Are you sure want to delete this leger?');">
                                                <i class="fa fa-remove"></i> Delete</a>
                                            @endpermission   
                                            </td>
                                           
                                        </tr>
                                        
                                @endforeach
                                    <tr>
                                        <td colspan="2">a. Total </td>
                                        <td class="text-info"> {{ $total_Dr }}</td>
                                        <td class="text-success">{{ $total_Cr }}</td>
                                        <td class="text-danger">{{ $total_Dr-$total_Cr }}</td>
                                    </tr>

                            </tbody>
                            
                        </table>
                            
                        </div>
                    </div>
                </div>

                <div class="card-action">
                  <a href="{{url('admin/home')}}" class="btn btn-info">Return Back</a>
              </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <table  class="table table-striped table-bordered">
          <thead>
              <tr>
              
              <th>Fee Name</th>
              <th>Amount</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($feeDetails as $item)
              
                  <tr>
                      
                      <td>{{ $item->feelists->fee_name }}</td>
                    
                      <td>{{ $item->feelists->amount }}</td>
                      
                  </tr>
              
                  
              @endforeach
              
              <tr>
                  <td>Total Credit ({{ $totalCredit }})</td>
                  <td></td>
              </tr>
              
              
          </tbody>
          
      </table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
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
