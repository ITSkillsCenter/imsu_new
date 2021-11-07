@extends('layouts.master')

@section('title', 'Registration List')
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
                      <h2>Registration<small> Registration basic information.</small></h2>
                      <hr>
                       <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Registration</a></li>
                            @if(isset($dept))
                            <li class="breadcrumb-item"><a href="#">{{ $dept }}</a></li>
                            @endif
                            @if(isset($semester))
                            <li class="breadcrumb-item active" aria-current="page">{{ $semester }}</li>
                            @endif
                          </ol>
                        </nav>
                      <div class="clearfix"></div>
                      @if(count($departments)>0)
                    @foreach ($departments as $d)
                  <a href="{{ route('registration.department_reg',$d->department) }}" class="btn @if($d->department==$dept) btn-danger @endif btn-info">{{$d->department}}</a>
                    @endforeach
                    @endif
                      <div class="clearfix"></div>
                      <hr>
                      @if(count($semesters)>0)
                      @foreach ($semesters as $s)
                  <a href="{{ route('registration.semester_reg',['dept'=>$dept,'semester'=>$s->semester]) }}" class="btn 
                  @if($s->semester==$semester)  btn-danger @endif ">{{$s->semester}}</a>
                    @endforeach
                    
                     <hr>
                    
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>1]) }}"
                  class="btn btn-sm btn-success"> @if($type==1) <i class="fas fa-check"></i> @endif Regular</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>2]) }}"
                  class="btn btn-sm btn-primary"> @if($type==2) <i class="fas fa-check"></i> @endif Term-Repeat</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>3]) }}"
                  class="btn btn-sm btn-info"> @if($type==3) <i class="fas fa-check"></i> @endif Referred</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>4]) }}"
                  class="btn btn-sm btn-danger"> @if($type==4) <i class="fas fa-check"></i> @endif Improvement</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>5]) }}"
                  class="btn btn-sm btn-warning"> @if($type==5) <i class="fas fa-check"></i> @endif Backlog</a>
                  <a href="{{ route('registration.details_dept',['dept'=>$dept,'semester'=>$semester,'type'=>6]) }}"
                  class="btn btn-sm btn-success"> @if($type==6) <i class="fas fa-check"></i> @endif Retake</a>
                    @endif
                    
                  </div>

                  <div class="x_content">
                    @if(count($registrations)>0)
                  <h3 class="text-center">Total:{{$total}}</h3>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Student Id</th>
                          <th>Phone Number</th>
                          <th>Semester</th>
                          <th>Deparment</th>
                          <th>Registration For</th>
                          <th>Courses</th>
                          <th>Credit hr.</th>
                          
                          <th>Registration At</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          @php
                            $total_credit_hr=0;
                            
                          @endphp
                        
                      @foreach($registrations as $reg)
                      @php
                        $phone = \App\StudentInfo::where('Registration_Number',$reg->student_id)->first();
                        $courses = DB::table('courses')
                                ->join('courses_student','courses.id','=','courses_student.course_id')
                                ->select('courses.credit','courses.course_code','courses.course_name','courses_student.student_id','courses_student.course_id','courses_student.reg_type')
                                ->where('courses_student.student_id',$reg->student_id)
                                ->where('courses_student.semester',$semester)
                                ->where('courses_student.reg_type',$type)
                                ->get();
                        $total=0;
                        
                      @endphp
                        <tr>
                          <td>{{$reg->student_id}}</td>
                          <td>{{$phone->Student_Mobile_Number}}</td>
                          <td><a href="{{ route('registration.details',['student_id'=>$reg->student_id,'semester'=>$reg->semester,'reg_type'=>$reg->reg_type]) }}">{{$reg->semester}}</a></td>
                          <td>{{$reg->department}}</td>
                          
                          
                    <td>
                      {{$reg->levelTerm}}
                    </td>
                    <td>
                        @foreach($courses as $c)
                        
                        {{ $c->course_code}},
                        @php
                        $total=$total+$c->credit;
                        @endphp
                        @endforeach
                    </td>
                    
                    <td>{{$total}}</td>
                    @php
                        $total_credit_hr+=$total;
                    @endphp
                    
                    <td>
                      {{$reg->created_at}}
                    </td>
                    <td>
                        @permission('registration_approval-edit')
                        @if($reg->reg_type ==1||$reg->reg_type ==2)
                            @if($reg->dept_clearance==1)
                            <a href="#" class="btn btn-success  disabled   btn-sm"> <i class="fas fa-check"></i>   Approved  </a> 
                            @endif
                            @if($reg->dept_clearance==0)
                            <a href="{{ route('registration.department_clear',$reg->id) }}" class="btn btn-danger   btn-sm" onclick="return confirm('Are you sure you want to approved this registration?')"> <i class="fas fa-check"></i>  Give Approval  </a> 
                            @endif
                        @endif
                        @endpermission
                        
                                @permission('registration-read')
                                <a href="{{ route('registration.details',['student_id'=>$reg->student_id,'semester'=>$reg->semester,'reg_type'=>$reg->reg_type]) }}" class="btn btn-primary btn-sm"> <i class="fas fa-eye"></i> view</a>
                                @endpermission
                                 @permission('registration-edit')
                                <a href="{{ route('registration.edit',['student_id'=>$reg->student_id,'semester'=>$reg->semester,'reg_type'=>$reg->reg_type]) }}" class="btn btn-warning btn-sm"> <i class="fas fa-pen"></i> edit</a>
                                 @endpermission
                                 @permission('registration-delete')
                                 <a href="{{ route('registration.delete',['student_id'=>$reg->student_id,'semester'=>$reg->semester,'reg_type'=>$reg->reg_type]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this registration?')"> <i class="fas fa-trash"></i> delete</a>
                                @endpermission
                            </td>
                    
                        </tr>
                      @endforeach
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total Credit hr. </td>
                          <td>{{$total_credit_hr}}</td>
                          <td></td>
                          <td></td>
                      </tr>
                      </tbody>
                    </table>
                    @endif
                  </div>
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
          "pageLength": 100,
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
