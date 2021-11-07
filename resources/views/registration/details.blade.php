@extends('layouts.master')

@section('title', 'Registration Details Report')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/green.css')}}" rel="stylesheet">
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
                    

                  <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                      <div class="card card-info">
                          <div class="card-header">
                            <h3 class="card-title text-center"> Registration Details of {{ $semester }} for student ID:{{$student_id}}</h3>
                          <a  href="{{route('registration.download',[$student_id,$semester,$type])}}" class="btn btn-info"><i class="fas fa-print"></i>Print</a>
                          </div>
                          <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Course Code</th>
                                  <th>Course Name</th>
                                  <th>Registration Type</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                  @php
                                  $tc= 0;
                                  @endphp
                                  @foreach ($reg_students as $course)
                                  <tr>
                                    <td>{{ $course->course_code }}</td>
                                    <td>{{ $course->course_name }}</td>
                                    @php 
                                    
                                    $typeOfReg=$course->reg_type;
                                    $levelTerm=$course->levelTerm;
                                    @endphp
                                    <td>  @if($course->reg_type==1)
                                      <b>Regular/Term wise</b>
                                      @elseif($course->reg_type==2)
                                      <b>Term Repeat</b>
                                      @elseif($course->reg_type==3)
                                      <b>Referred</b>
                                      @elseif($course->reg_type==4)
                                      <b>Improvement</b>
                                      @elseif($course->reg_type==5)
                                      <b>Backlog</b>
                                      @elseif($course->reg_type==6)
                                      <b>Retake</b>
                                      @endif</td>
                                      
                                    <td>
                                        
                                        <a href="{{route('course.delete_registration',$course->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    
                                    @php $tc= $tc+$course->credit; @endphp
                                  </tr>
                                  @endforeach
                              </tbody>
                            </table>
                        
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                              <p class="text-center text-secondary"> Total:   <?php echo $tc;?> credit </p>
                        </div>
                        </div>
                        <!-- /.card -->
                        
                      </div>
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
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/icheck.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>

   <script>

    $(document).ready(function() {
        $(".subject").select2({
            placeholder: "Pick a Subject",
             allowClear: true
        });
    
   });
   </script>
   <!-- /validator -->
@endsection
