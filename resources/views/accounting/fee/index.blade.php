@extends('layouts.master',['title'=>'Ledger'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Account','Title'=>'Ledger'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ledger basic information.</div>
                </div>
                <div class="card-header">
                  <a class="btn btn-success " href="{{route('fee.create')}}">+ Add New</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                          @if(count($fees)>0)
                          <div class="x_content">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Account Head</th>
                                  <th>Particular Name</th>
                                  <th>Amount Type</th>
                                  <th>Section(invoice)</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                              @foreach($fees as $fl)
                                <tr>
                                    @php
                                        $name=DB::table('chart_accounts')->where('id',$fl->chart_account_id)->first();
                                    @endphp
                                  <td>{{$name->name}}</td>
                                  <td>{{$fl->fee_name}}</td>
                                  <td>{{$fl->account_type}}</td>
                                  <td>{{$fl->section}}</td>
                                  
                  
                                  <td>
                                <?php
                                  if($fl->status ==1){
                                    echo '<b class="label label-success">Active for Regular Registration </b>';
                                  }elseif($fl->status ==2){
                                    echo '<b class="label label-primary">Active for Term Repeat </b>';
                                  }else{
                                    echo '<b class="label label-info"> Ledger</b>';
                                  }
                                ?>
                              </td>
                                  
                                  
                                  <td>
                                 <div class="btn-group">
                                  <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$fl->id}}' href='{{URL::route('fee.edit',$fl->id)}}'> <i class="
                                    fas fa-check icon-white"></i></a>
                                   <form class="deleteForm" method="POST" action="{{URL::route('fee.destroy',$fl->id)}}">
                                     {{csrf_field()}} 
                                      {{ method_field('DELETE') }} 
                                   <button type="submit" class='btn btn-danger btn-xs btnDelete'  onclick="return confirm('Are you sure want to delete this?');"> <i class="
                                    fas fa-trash-alt icon-white"></i></button>
                                 </form>
                                 </div>
                              </td>
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