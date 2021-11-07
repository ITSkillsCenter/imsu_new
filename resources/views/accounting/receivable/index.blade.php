@extends('layouts.master',['title'=>'Receivable'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Receivable','Title'=>'Receivable'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Student Recivable</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                           
                            @if (isset($departments))
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                    <div class="x_title">
                                        {{-- <h2>Student Recivable</small></h2> --}}
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Serial</th>
                                            <th>Department</th>
                                            <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($departments as $department)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$department->short_name}}</td>
                                            @if(isset($chart_account_id))
                                            <td>
                                                <a href="{{ route('receivable.dept_account', [$department->short_name,$chart_account_id]) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> Details</a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="{{ route('receivable.dept', $department->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                            </td>
                                            @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                <!-- row end -->
                                <div class="clearfix"></div>
            
                                </div>
                            </div>
                        @elseif(isset($sessions))
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                    <div class="x_title">
                                        <h4>Student's Receivables - 
                                            <a href="{{ route('account.receivable') }}">
                                                <u>{{ $dept = \App\Department::where('id',$dept_id)->value('short_name') }}</u>
                                            </a> 
                                        </h4>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Serial</th>
                                            <th>Session</th>
                                            <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($sessions as $session)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$session->title}}</td>
                                            <td>
                                                <a href="{{ route('receivable.session', [$dept_id,$session->id]) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                <!-- row end -->
                                <div class="clearfix"></div>
            
                                </div>
                            </div>
                        @elseif(isset($batches))
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                    <div class="x_title">
                                        <h4>Student's Receivables - 
                                            <a href="{{ route('account.receivable') }}">
                                                <u>{{ $dept = \App\Department::where('id',$dept_id)->value('short_name') }}</u>
                                            </a> 
                                        </h4>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Serial</th>
                                            <th>Batch</th>
                                            <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        @foreach($batches as $batch)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$batch->Batch}}</td>
                                            <td>
                                                <a href="{{ route('receivable.batch', [$dept_id,$batch->Batch]) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> Details</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                <!-- row end -->
                                <div class="clearfix"></div>
            
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                    <div class="x_title">
                                        <h4>Student's Receivables - 
                                            <a href="{{ route('account.receivable') }}">
                                                <u>{{ $dept = \App\Department::where('id',$dept_id)->value('short_name') }}</u> / 
                                            </a>
                                            <a href="{{ route('receivable.dept', $dept_id) }}">
                                                <u>{{ $session = \App\Current_Semester_Running::where('id',$session_id)->value('title') }}</u> / 
                                            </a> 
                                        </h4>
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Level - Term</th>
                                            <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>100 Level</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id,'100']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>200 Level</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id,'200']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>300 Level</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id, '300']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>400 Level</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id, '400']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td>L3T1</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id, 'l3t1']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>L3T2</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id, 'l3t2']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>L4T1</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id, 'l4t1']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>L4T2</td>
                                                <td>
                                                    <a href="{{ route('receivable.level', [$dept_id,$session_id, 'l4t2']) }}" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i> manage</a>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                <!-- row end -->
                                <div class="clearfix"></div>
            
                                </div>
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
<script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>

   <script>

     $(document).ready(function() {
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
     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-buttons").length) {
         
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
