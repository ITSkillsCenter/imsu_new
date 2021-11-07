@extends('layouts.master')

@section('title', 'Registration Edit')
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
                                <h3>Student ID: <b>{{$student_id}}</b></h3>
                                <h3>Registered For: <b>{{$semester}}</b></h3>
                                <form action="{{ route('registration.reg_type_update', [$student_id,$semester,$type]) }}" method="post">
                                    @csrf
                                    @method("PATCH")    
                                    <label for="type">Registration Type:</label>
                                    <select name="reg_type" class="form-control" for="inputPassword2">
                                        <option @if ($type == 1) selected @endif  value="1">Regular/Term-Wise</option>
                                        <option @if ($type == 2) selected @endif value="2">Term-Repeat</option>
                                        <option @if ($type == 3) selected @endif value="3">Referred</option>
                                        <option @if ($type == 4) selected @endif value="4">Improvement</option>
                                        <option @if ($type == 5) selected @endif value="5">Backlog</option>
                                        <option @if ($type == 6) selected @endif value="6">Retake</option>
                                    </select>
                                    <br>
                                    <button class="btn btn-success pull-right" type="submit">update</button>
                                </form>
                                
                                @php
                                    $student = App\StudentInfo::select('Program')->where('Registration_Number',$student_id)->first();
                                    $courses= App\Course::where('Program',$student->Program)->get();
                                @endphp
                                <form action="{{route('course.add_registration')}}" method="POST">
                                    @csrf
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <select name="course_id" class="form-control subject">
                                                    <option selected disabled>--Select a Course--</option>
                                                    @foreach($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->course_code}} {{$course->course_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <input type="hidden" name="semester" value={{$semester}}>
                                            <input type="hidden" name="student_id" value={{$student_id}}>
                                            <input type="hidden" name="reg_type" value={{$type}}>
                                            
                                            <td>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> ADD</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <br><br><br>
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
                                        
                                        <a href="{{route('course.delete_registration',$course->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a></td>
                                    
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
