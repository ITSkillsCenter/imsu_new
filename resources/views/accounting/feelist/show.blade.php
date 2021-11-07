@extends('layouts.master')

@section('title', 'FeeList')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>FeeList<small> Feelists basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_title ">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Fee Structure 
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu"> 
                      @foreach ($semesters as $item)
                        <li><a class="btn btn-info" href="{{route('feelist.show',$item->semester)}}">{{ $item->semester }}</a></li>
                      @endforeach 
                      </ul>
                    </div>

                    <div class="text-right">
                      <a class="btn btn-success " href="{{route('feelist.create')}}">+ Add New</a>
                    </div>
            
                    <div class="clearfix"></div>
                  </div>
                 
                  @if(count($feeStructures)>0)
                  <div class="x_content">
                    @foreach ($departments as $item)
                        @if ($item->department=='CSE')
                        <h3 class="text-center">Fee Structure for {{ $item->department }} ({{ $semester }})</h3>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                @foreach ($feeStructures as $item)
                                @if ($item->department=='CSE')
                                    <th>{{ $item->fee_name }}</th>
                                @endif
                                @endforeach
                            </tr>
                        </thead>
                        <body>
                            <tr>
                                @foreach ($feeStructures as $item)
                                    @if ($item->department=='CSE')
                                        <th>{{ $item->amount }}</th>
                                    @endif
                                @endforeach 
                            </tr>
                        </body>
                        
                        </table>
                        <br>
                        @elseif($item->department=='EEE')

                        <h3 class="text-center">Fee Structure for {{ $item->department }} ({{ $semester }})</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @foreach ($feeStructures as $item)
                                        @if ($item->department=='EEE')
                                        <th>{{ $item->fee_name }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <body>
                                <tr>
                                @foreach ($feeStructures as $item)
                                    @if ($item->department=='EEE')
                                    <th>{{ $item->amount }}</th>
                                    @endif
                                    
                                @endforeach 
                                </tr>
                            </body>
                            
                        </table>
                        <br>

                        @elseif($item->department=='CE')

                        <h3 class="text-center">Fee Structure for {{ $item->department }} ({{ $semester }})</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @foreach ($feeStructures as $item)
                                        @if ($item->department=='CE')
                                        <th>{{ $item->fee_name }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <body>
                                <tr>
                                @foreach ($feeStructures as $item)
                                    @if ($item->department=='CE')
                                    <th>{{ $item->amount }}</th>
                                    @endif
                                    
                                @endforeach 
                                </tr>
                            </body>
                            
                        </table>
                        <br>
                        @elseif($item->department=='BBA')

                        <h3 class="text-center">Fee Structure for {{ $item->department }} ({{ $semester }})</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @foreach ($feeStructures as $item)
                                        @if ($item->department=='BBA')
                                        <th>{{ $item->fee_name }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <body>
                                <tr>
                                @foreach ($feeStructures as $item)
                                    @if ($item->department=='BBA')
                                    <th>{{ $item->amount }}</th>
                                    @endif
                                    
                                @endforeach 
                                </tr>
                            </body>
                            
                        </table>
                        <br>
                        @elseif($item->department=='English')

                        <h3 class="text-center">Fee Structure for {{ $item->department }} ({{ $semester }})</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @foreach ($feeStructures as $item)
                                        @if ($item->department=='English')
                                        <th>{{ $item->fee_name }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <body>
                                <tr>
                                @foreach ($feeStructures as $item)
                                    @if ($item->department=='English')
                                    <th>{{ $item->amount }}</th>
                                    @endif
                                    
                                @endforeach 
                                </tr>
                            </body>
                            
                        </table>
                        <br>
                        <br>
                        @elseif($item->department=='LLB')

                        <h3 class="text-center">Fee Structure for {{ $item->department }} ({{ $semester }})</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @foreach ($feeStructures as $item)
                                        @if ($item->department=='LLB')
                                        <th>{{ $item->fee_name }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <body>
                                <tr>
                                @foreach ($feeStructures as $item)
                                    @if ($item->department=='LLB')
                                    <th>{{ $item->amount }}</th>
                                    @endif
                                    
                                @endforeach 
                                </tr>
                            </body>
                            
                        </table>
                     @endif
                    @endforeach
                  </div>
                  @endif
                </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
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
