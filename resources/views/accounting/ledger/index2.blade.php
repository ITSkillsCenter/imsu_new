@extends('layouts.master',['title'=>'Student | Ledger'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Account','Title'=>'Ledger'])
      

     <?php

     function parent_total($cid,$from,$to){
        $child= DB::table('chart_accounts')->select('id','parent_id')->where('parent_id',$cid)->first();
           
            $Drtotal_parent=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$child->parent_id)->sum('amount');
           
            $Drtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$child->id)->sum('amount');
            
            $Drtotal=$Drtotal_parent+$Drtotal_child;
    
        $Crtotal_parent=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$child->parent_id)->sum('amount');
        
        $Crtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$child->id)->sum('amount');
        
         $Crtotal=$Crtotal_parent+$Crtotal_child;
          if($Drtotal>=$Crtotal){
            return $Drtotal-$Crtotal;
        }else{
            return $Crtotal-$Drtotal;
        }
    }
    
    
    
    function child_total($cid,$from,$to){
        //$child= DB::table('chart_accounts')->select('id','parent_id')->where('parent_id',$cid)->first();
            
            // $Drtotal_parent=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$child->parent_id)->sum('amount');
           
            $Drtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$cid)->sum('amount');
            
        //     $Drtotal=$Drtotal_parent+$Drtotal_child;
    
        // $Crtotal_parent=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$child->parent_id)->sum('amount');
        
        $Crtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$cid)->sum('amount');
        
        // $Crtotal=$Crtotal_parent+$Crtotal_child;
          if($Drtotal_child>=$Crtotal_child){
            return $Drtotal_child-$Crtotal_child;
        }else{
            return $Crtotal_child-$Drtotal_child;
        }
    }
    
        function opening_bal($cid,$to){
            $from='2015-02-14';
            $Drtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$cid)->sum('amount');

        $Crtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$cid)->sum('amount');
        
        // $Crtotal=$Crtotal_parent+$Crtotal_child;
          if($Drtotal_child>=$Crtotal_child){
            return $Drtotal_child-$Crtotal_child;
        }else{
            return $Crtotal_child-$Drtotal_child;
        }
    }
    
?>


     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Elements</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="x_content">
                      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalCenter">Date Picker</button>
                    </div>
                    @if (isset($from))
                        
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <!-- Trigger the modal with a button -->
                            
                            <p class="text-center">Balance Sheet</p>
                                <h3 class="text-center">BAIUST</h3>
                                <p class="text-center">From Date: {{ $from }} to {{ $to }}</p>
                            </div>
                            <div class="x_content">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <!--<div class="x_title">-->
                                        <!--    <h4 class="text-center">Balance Sheet</h4>-->
                                            
                                        <!--</div>-->
                                       
                                        <div class="card-body">
                                            <table class="table">
                                                @foreach($bs_items as $category)
                                                <tr>
                                                    <td><h5><b>{{$category->name}}</td>
                                                    <td>Opening Balance</td>
                                                    <td><span style="float:right;">
                                                        <?php
                                                        //echo $pt=parent_total($category->id,$from,$to);
                                                        
                                                        ?>
                                                    </span></h5> </b></td>
                                                    @if(count($category->childs))
                                                        @include('accounting.ledger.sub_account',['subcategories' => $category->childs,'from'=>$from,'to'=>$to])
                                                    @endif
                                                    
                                                </tr>
                                                 @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                <!--<table  class="table table-striped table-bordered" >-->
                                <!--    <thead>-->
                                <!--        <tr>-->
                                        
                                <!--        <th>Particulars</th>-->
                                <!--        <th>Opening Balance</th>-->
                                <!--        <th>Debit</th>-->
                                <!--        <th>Credit</th>-->
                                <!--        <th>Closing Balance</th>-->
                                <!--        </tr>-->
                                <!--    </thead>-->
                                <!--        <tr>-->
                                <!--            <td><a href="#">Student Acc. Receivable</a></td>-->
                                <!--            <td>{{ $opening_bal }}</td>-->
                                <!--            <td>{{ $debit }}</td>-->
                                <!--            <td>{{ $credit }}</td>-->
                                <!--            <td>{{ $opening_bal+$debit-$credit }}</td>-->
                                <!--        </tr>-->
                                    
                                <!--    <tbody>-->
                                       
                                <!--    </tbody>-->
                                    
                                <!--</table>-->
                                </div>
    
                            </div>
                        </div>
                    <!-- row end -->
                    </div>
                    @endif
                </div>
                </div>
                </div>
               
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Date Range Select Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <form class="form-horizontal" action="{{ route('ledger.indexReport') }}" role="form" method="POST">
          @csrf
              <div class="form-group">
                  
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label for="inputKey" class="col-md-1 control-label">From</label>
                          <div class="col-md-12">
                              <input type="date" name="from" class="form-control" id="inputKey" >
                          </div>
                          <label for="inputValue" class="col-md-1 control-label">To</label>
                          <div class="col-md-12">
                              <input type="date" name="to" class="form-control" value="{{$today->format('d/m/Y')}}" id="inputValue" >
                          </div>
                          <div class="col-md-12 mt-2">
                              <button type="submit"   class="btn btn-info" >Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
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
{{-- <script type="text/javascript">
    $(window).on('load', function() {
        $('#ModalCenter').modal('show');
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
