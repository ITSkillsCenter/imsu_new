@extends('layouts.master',['title'=>'Student | Ledger'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Student','Title'=>'Student | Ledger'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Journal Entry Form</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            
                            <form  action="{{ route('ledger.store') }}" method="post">
                                @csrf
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
                                             @if(!isset($student_id))
                                             <select class="form-control student" name="student_id" >
                                                 <option></option>
                                                 @foreach ($students as $item)
                                                     <option value="{{ $item->Registration_Number }}" >{{ $item->Registration_Number }}-{{ $item->Full_Name }}</option>
                                                 @endforeach
                                             </select>
                                             @else
                                             <input type="text" class="form-control" name="student_id" value="{{$student_id}}" readonly />
                                             <input type="hidden" class="form-control" name="receivable_id" value="{{$receivable_id}}" readonly />
                                             @endif
                                         </div>
                                     </div>
                                     
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Select Type</label>
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
                                
                             </div>
                            <div class="row">
                                 
                                 <div class="col-md-3">
                                     <!--<div class="form-group">-->
                                     <!--    <label>Select Account Head(*)</label>-->
                                     <!--    <div class="input-group">-->
                                     <!--        <select name="parent_id_1" class="form-control select2">-->
                                     <!--            <option ></option>-->
                                     <!--            @foreach($bs_items as $category)-->
                                     <!--            <ul>-->
                                     <!--                <li><option value="{{$category->id}}"><b>{{$category->name}}</b>-->
                                     <!--                    </option></li>-->
                                     <!--                @if(count($category->childs))-->
                                     <!--                    @include('accounting.chart_account.sub_option',['subcategories' => $category->childs])-->
                                     <!--                @endif-->
                                     <!--            </ul>-->
                                     <!--            @endforeach-->
                                     <!--            @foreach($is_items as $category)-->
                                     <!--            <ul>-->
                                     <!--                <li><option value="{{$category->id}}"><b>{{$category->name}}</b>-->
                                     <!--                    </option></li>-->
                                     <!--                @if(count($category->childs))-->
                                     <!--                    @include('accounting.chart_account.sub_option',['subcategories' => $category->childs])-->
                                     <!--                @endif-->
                                     <!--            </ul>-->
                                     <!--            @endforeach-->
                                     <!--        </select>-->
                                     <!--    </div>-->
                                     <!--</div>-->
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Select Particular(*)</label>
                                         <div class="input-group">
                                             <select class="form-control select2" name="fee_id_1" >
                                                 <option></option>
                                                     @foreach ($fees->where('account_type','Dr') as $item)
                                                     <option value="{{ $item->id }}">{{ $item->fee_name }}-{{$item->account_type}}</option>
                                                     @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Debit Amount(*)</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="amount_1" placeholder="Debit Amount">
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
                                     <!--<div class="form-group">-->
                                     <!--    <label>Select Account Head(*)</label>-->
                                     <!--    <div class="input-group">-->
                                     <!--        <select name="parent_id_2" class="form-control select2">-->
                                     <!--            <option ></option>-->
                                     <!--            @foreach($bs_items as $category)-->
                                     <!--            <ul>-->
                                     <!--                <li><option value="{{$category->id}}"><b>{{$category->name}}</b>-->
                                     <!--                    </option></li>-->
                                     <!--                @if(count($category->childs))-->
                                     <!--                    @include('accounting.chart_account.sub_option',['subcategories' => $category->childs])-->
                                     <!--                @endif-->
                                     <!--            </ul>-->
                                     <!--            @endforeach-->
                                     <!--            @foreach($is_items as $category)-->
                                     <!--            <ul>-->
                                     <!--                <li><option value="{{$category->id}}"><b>{{$category->name}}</b>-->
                                     <!--                    </option></li>-->
                                     <!--                @if(count($category->childs))-->
                                     <!--                    @include('accounting.chart_account.sub_option',['subcategories' => $category->childs])-->
                                     <!--                @endif-->
                                     <!--            </ul>-->
                                     <!--            @endforeach-->
                                     <!--        </select>-->
                                     <!--    </div>-->
                                     <!--</div>-->
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Select Particular(*)</label>
                                         <div class="input-group">
                                             <select class="form-control select2" name="fee_id_2" >
                                                 <option></option>
                                                     @foreach ($fees->where('account_type','Cr') as $item)
                                                     <option value="{{ $item->id }}">{{ $item->fee_name }}-{{$item->account_type}}</option>
                                                     @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Credit Amount(*)</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="amount_2" placeholder="Credit Amount">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <label>Remarks</label>
                                 <textarea class="form-control" name="remarks_2"></textarea>
                                 </div>
                             </div>
                             <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{url('admin/home')}}" class="btn btn-info">Return Back</a>
                             </div>
                         </form>
                            
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
