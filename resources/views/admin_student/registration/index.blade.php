@extends('admin_student.master')
@section('title')
Student || Registration
@endsection
@section('main')
{{-- top section starts --}}
  <section class="content-header">
      <div class="container-fluid">
        {{-- showing module version --}}
        <div class="row">
          <div class="col-md-12">
              <a href="#" class="btn btn-outline-info float-right"> Registration Module v1.1</a>
          </div>
        </div>
        {{-- module version ends --}}

        {{-- student details box starts --}}
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Student ID</label>
              <input type="text" class="form-control" value="{{ Helper::student_info()->Registration_Number }}" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Current Level-Term</label>
              <input type="text" class="form-control" value="{{ Helper::student_info()->Current_semester }}" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Current Session Running:</label>
              <input type="text" class="form-control" value="{{ Helper::current_semester() }}" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Previous Session:</label>
              <input type="text" class="form-control" value="{{ Helper::previous_semester() }}" readonly>
            </div>
          </div>
        </div>
        {{-- ends --}}
      </div>
    </section>
{{-- ends --}}

{{-- main content starts --}}
  <section class="content mb-3">
    {{-- at the beginning --}}
      @if (is_null($reg_type))
        <div class="row">
            <div class="col-md-12 mt-3 text-center text-danger">
                To make any correction regarding your registration please contact your department. ICT Wing no longer helds authority to fix this issue. <br> You can view your performed registrations by clicking on <b>View Registrations</b> from the menu.
            </div>
          <div class="col-md-12 mt-3 table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Title</th>
                    <th>For Session</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Regular Registration</td>
                        <td>{{ Helper::current_semester() }}</td>
                        <td>
                            @php
                                $session_id = App\Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                                $event = App\Event::with('type')
                                                ->where('session_id',$session_id)
                                                ->where('type_id','1')
                                                ->first();
                            @endphp
                           {{ \Carbon\Carbon::parse($event->ends)->format('d M Y') }}
                        </td>
                        <td>
                            @php
                                $check = DB::table('registrations')
                                        ->where('student_id',Helper::student_info()->Registration_Number)
                                        ->where('semester',Helper::current_semester())
                                        ->whereIn('reg_type',[1,2])
                                        ->count();
                            @endphp
                            
                            @if($check == 0)
                                <a href="{{ route('student.registration_type', 1) }}" class="btn btn-info btn-sm">Perform</a>
                            @else
                                <a href="{{ route('check.registration') }}" class="btn btn-success btn-sm">View</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Term Repeat Registration</td>
                        <td>{{ Helper::current_semester() }}</td>
                        <td>
                            @php
                                $session_id = App\Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                                $event = App\Event::with('type')
                                                ->where('session_id',$session_id)
                                                ->where('type_id','8')
                                                ->first();
                            @endphp
                           {{ \Carbon\Carbon::parse($event->ends)->format('d M Y') }}
                        </td>
                        <td>
                           @php
                                $check = DB::table('registrations')
                                        ->where('student_id',Helper::student_info()->Registration_Number)
                                        ->where('semester',Helper::current_semester())
                                        ->whereIn('reg_type',[1,2])
                                        ->count();
                            @endphp
                            
                            @if($check == 0)
                                <a href="{{ route('student.registration_type', 2) }}" class="btn btn-info btn-sm">Perform</a>
                            @else
                                <a href="{{ route('check.registration') }}" class="btn btn-success btn-sm">View</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Referred Exam Registration</td>
                        <td>{{ Helper::previous_semester() }}</td>
                        <td>
                            @php
                                $session_id = App\Current_Semester_Running::where('title',Helper::previous_semester())->value('id');
                                $event = App\Event::with('type')
                                                ->where('session_id',$session_id)
                                                ->where('type_id','9')
                                                ->first();
                            @endphp
                           {{ \Carbon\Carbon::parse($event->ends)->format('d M Y') }}
                        </td>
                        <td>
                           <a href="{{ route('student.registration_type', 3) }}" class="btn btn-info btn-sm">Perform</a> <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Improvement Exam Registration</td>
                        <td>{{ Helper::previous_semester() }}</td>
                        <td>
                            @php
                                $session_id = App\Current_Semester_Running::where('title',Helper::previous_semester())->value('id');
                                $event = App\Event::with('type')
                                                ->where('session_id',$session_id)
                                                ->where('type_id','10')
                                                ->first();
                            @endphp
                           {{ \Carbon\Carbon::parse($event->ends)->format('d M Y') }}
                        </td>
                        <td>
                            <a href="{{ route('student.registration_type', 4) }}" class="btn btn-info btn-sm">Perform</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Backlog Exam Registration</td>
                        <td>{{ Helper::previous_semester() }}</td>
                        <td>
                            @php
                                $session_id = App\Current_Semester_Running::where('title',Helper::previous_semester())->value('id');
                                $event = App\Event::with('type')
                                                ->where('session_id',$session_id)
                                                ->where('type_id','11')
                                                ->first();
                            @endphp
                           {{ \Carbon\Carbon::parse($event->ends)->format('d M Y') }}
                        </td>
                        <td>
                            <a href="{{ route('student.registration_type', 5) }}" class="btn btn-info btn-sm">Perform</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Retake Exam Registration</td>
                        <td>{{ Helper::previous_semester() }}</td>
                        <td>
                            @php
                                $session_id = App\Current_Semester_Running::where('title',Helper::previous_semester())->value('id');
                                $event = App\Event::with('type')
                                                ->where('session_id',$session_id)
                                                ->where('type_id','12')
                                                ->first();
                            @endphp
                           {{ \Carbon\Carbon::parse($event->ends)->format('d M Y') }}
                        </td>
                        <td>
                            <a href="{{ route('student.registration_type', 6) }}" class="btn btn-info btn-sm">Perform</a>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      {{-- after choosing registration type --}}
      @else 
        {{-- if chosen type is regular --}}
        @if ($reg_type == '1')
          {{-- checking if last year student --}}
          @if ($level == 'l4t1' || $level == 'l4t2')
            <div class="row">
              <div class="col-md-8">
                <form action="{{route('student.registration')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                      <div class="col-md-4">
                        <label for="">Registration Type:</label>
                        <input type="text" name="reg_type" class="form-control" value="{{ $reg_type }}" readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="">Selected Session:</label>
                        <input type="text" name="semester" class="form-control" value="{{ Helper::current_semester() }}" readonly>
                      </div>

                      <div class="col-md-4">
                        <label for="">Selected Level-Term:</label>
                        <input type="text" name="level" class="form-control" value="{{ $level }}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Credit</th>
                            <th>Select</th>
                          </thead>
                          <tbody>
                            @foreach ($courses as $item)
                                <tr>
                                  <td>{{ $item->course->course_code }}</td>
                                  <td>{{ $item->course->course_name }}</td>
                                  <td>{{ $item->course->credit }}</td>
                                  <td><input type="checkbox" class="form-control" name="course_id[]" value="{{ $item->course_id }}" checked></td>
                                </tr>
                            @endforeach
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td>Total Credit: {{ $total_credit }}</td>
                                </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success float-right">submit</button>
                      </div>
                    </div>
                </form>
              </div>
              <div class="col-md-4">
                <div class="col-12 border border-danger mb-2">
                  <table class="table table-striped">
                    <thead>
                      <th>Offered Courses (which are optional - choose accordingly)</th>
                    </thead>
                    <tbody>
                      @foreach ($courses as $item)
                        @if ($item->course->type == 'offered')
                          <tr>
                            <td>{{ $item->course->course_code }} - {{ $item->course->course_name }}</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-12 border border-danger">
                  <table class="table table-striped">
                    <thead>
                      <th>Type</th>
                      <th>Title</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Regular Registration (For Next Semester)</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Term Repeat (Current Semester Again)</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Referred Examination (Selected Courses of Current Semester)</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Improvement (To achieve better grade in a particular course)</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Backlog (To clear previous irregular courses)</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Retake (Re-Register for particular courses to start from the beginning)</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          @else
            <div class="row">
              <div class="col-md-8">
                <form action="{{route('student.registration')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                      <div class="col-md-4">
                        <label for="">Registration Type:</label>
                        <input type="text" name="reg_type" class="form-control" value="{{ $reg_type }}" readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="">Selected Session:</label>
                        <input type="text" name="semester" class="form-control" value="{{ Helper::current_semester() }}" readonly>
                      </div>

                      <div class="col-md-4">
                        <label for="">Selected Level-Term:</label>
                        <input type="text" name="level" class="form-control" value="{{ $level }}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Credit</th>
                          </thead>
                          <tbody>
                            @foreach ($courses as $item)
                                <tr>
                                  <td>
                                    {{ $item->course->course_code }}
                                    <input type="text" name="course_id[]" value="{{ $item->course_id }}" hidden>
                                  </td>
                                  <td>{{ $item->course->course_name }}</td>
                                  <td>{{ $item->course->credit }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td>Total Credit: {{ $total_credit }}</td>
                                </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success float-right">submit</button>
                      </div>
                    </div>
                </form>
              </div>
              <div class="col-md-4 border border-danger">
                <table class="table table-striped">
                  <thead>
                    <th>Type</th>
                    <th>Title</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Regular Registration (For Next Semester)</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Term Repeat (Current Semester Again)</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Referred Examination (Selected Courses of Current Semester)</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Improvement (To achieve better grade in a particular course)</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Backlog (To clear previous irregular courses)</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Retake (Re-Register for particular courses to start from the beginning)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          @endif
        {{-- if selected type is term repeat --}}
        @elseif($reg_type == '2')
          <div class="row">
            <div class="col-md-8">
              <form action="{{route('student.registration')}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="form-row">
                    <div class="col-md-4">
                      <label for="">Registration Type:</label>
                      <input type="text" name="reg_type" class="form-control" value="{{ $reg_type }}" readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="">Selected Session:</label>
                      <input type="text" name="semester" class="form-control" value="{{ Helper::current_semester() }}" readonly>
                    </div>

                    <div class="col-md-4">
                      <label for="">Selected Level-Term:</label>
                      <input type="text" name="level" class="form-control" value="{{ $level }}" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                          <th>Course Code</th>
                          <th>Course Title</th>
                          <th>Credit</th>
                        </thead>
                        <tbody>
                          @foreach ($courses as $item)
                              <tr>
                                <td>
                                  {{ $item->course->course_code }}
                                  <input type="text" name="course_id[]" value="{{ $item->course_id }}" hidden>
                                </td>
                                <td>{{ $item->course->course_name }}</td>
                                <td>{{ $item->course->credit }}</td>
                              </tr>
                          @endforeach
                              <tr>
                                <td></td>
                                <td></td>
                                <td>Total Credit: {{ $total_credit }}</td>
                              </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success float-right">submit</button>
                    </div>
                  </div>
              </form>
            </div>
            <div class="col-md-4 border border-danger">
              <table class="table table-striped">
                <thead>
                  <th>Type</th>
                  <th>Title</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Regular Registration (For Next Semester)</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Term Repeat (Current Semester Again)</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Referred Examination (Selected Courses of Current Semester)</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Improvement (To achieve better grade in a particular course)</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Backlog (To clear previous irregular courses)</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Retake (Re-Register for particular courses to start from the beginning)</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        {{-- if selected type is reffered --}}
        @elseif($reg_type == '3')
          <div class="row">
            <div class="col-md-8">
              <form action="{{route('student.registration')}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="form-row">
                    <div class="col-md-4">
                      <label for="">Registration Type:</label>
                      <input type="text" name="reg_type" class="form-control" value="{{ $reg_type }}" readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="">Selected Session:</label>
                      <input type="text" name="semester" class="form-control" value="{{ Helper::previous_semester() }}" readonly>
                    </div>

                    <div class="col-md-4">
                      <label for="">Selected Level-Term:</label>
                      <input type="text" name="level" class="form-control" value="{{ $level }}" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                          <th>Course Code</th>
                          <th>Course Title</th>
                          <th>Credit</th>
                        </thead>
                        <tbody>
                          @foreach ($courses as $item)
                              <tr>
                                <td>{{ $item->course->course_code }}</td>
                                <td>{{ $item->course->course_name }}</td>
                                <td>{{ $item->course->credit }}</td>
                                <td><input type="checkbox" class="form-control" name="course_id[]" value="{{ $item->course_id }}" checked></td>
                              </tr>
                          @endforeach
                          <tr>
                            <td></td>
                            <td></td>
                            <td>Total Credit: {{ $total_credit }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success float-right">submit</button>
                    </div>
                  </div>
              </form>
            </div>
            <div class="col-md-4 border border-danger">
              <table class="table table-striped">
                <thead>
                  <th>Type</th>
                  <th>Title</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Regular Registration (For Next Semester)</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Term Repeat (Current Semester Again)</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Referred Examination (Selected Courses of Current Semester)</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Improvement (To achieve better grade in a particular course)</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Backlog (To clear previous irregular courses)</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Retake (Re-Register for particular courses to start from the beginning)</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        {{-- if selected type is improvement/backlog/retake --}}
        @else
          <div class="row">
            <div class="col-md-8">
              <form action="{{route('student.registration')}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="form-row">
                    <div class="col-md-4">
                      <label for="">Registration Type:</label>
                      <input type="text" name="reg_type" class="form-control" value="{{ $reg_type }}" readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="">Selected Session:</label>
                      <input type="text" name="semester" class="form-control" value="{{ Helper::previous_semester() }}" readonly>
                    </div>

                    <div class="col-md-4">
                      <label for="">Selected Level-Term:</label>
                      <input type="text" name="level" class="form-control" value="Not Required" readonly>
                    </div>
                  </div>
                  <div class="form-row mt-3">
                    <div class="col-md-12 text-danger">
                      <p>
                        <i class="fas fa-warning"></i>  Please be careful about your course selection. Your registration fee will depend on your number of courses, additional courses will add additional fees. <br>
                        You will be charged <b>TK. 500/=</b> for each intentional mistake.
                      </p>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Select Courses (<span class="text-info">type course code to search courses</span>):</label>
                        <select name="course_id[]" class="form-control select2" multiple="multiple">
                          @foreach ($courses as $item)
                              <option value="{{ $item->course_id }}">{{ $item->course->course_code }} - {{ $item->course->course_name }} - Credit: {{ $item->course->credit }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success float-right">submit</button>
                    </div>
                  </div>
              </form>
            </div>
            <div class="col-md-4 border border-danger">
              <table class="table table-striped">
                <thead>
                  <th>Registration Type</th>
                  <th>Title</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Regular Registration (For Next Semester)</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Term Repeat (Current Semester Again)</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Referred Examination (Selected Courses of Current Semester)</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Improvement (To achieve better grade in a particular course)</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Backlog (To clear previous irregular courses)</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Retake (Re-Register for particular courses to start from the beginning)</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        @endif
      @endif
  </section>
{{-- ends --}}
@endsection

@section('extrascript')
  <script>
   $(document).ready(function() {
     $('#level').on('change',function (){
                 var level= $('#level').val();
                 //alert(level);
                if(!level){
                 new PNotify({
                     title: 'Validation Error!',
                     text: 'Please Pic A Level!',
                     type: 'error',
                     styling: 'bootstrap3'
                 });
             }
             else {
                     //for subjects
                     $.ajax({
                         url:'/student-course/'+level,
                         type: 'get',
                         dataType: 'json',
                         success: function(data) {
                            // alert(data);
                             console.log(data);
                             var res='';
                            //$('#student_id').empty();
                             $('#course').append('<option  value="">Pic Courses</option>');
                             $.each(data, function(key, value) {
                                 
                                 res +=
                                 '<option value="'+value.id+'">'+value.course_code+'['+value.course_name+']</option>';
                             });
                             $('#course').html(res);
                            
 
                         },
                         error: function(data){
                             console.log(data);
                             var respone = JSON.parse(data.responseText);
                             $.each(respone.message, function( key, value ) {
                                 new PNotify({
                                     title: 'Error!',
                                     text: value,
                                     type: 'error',
                                     styling: 'bootstrap3'
                                 });
                             });
                         }
                     });
                 }
     });
   });
  </script>
  <script>
    $(document).ready(function() {
        $('.select2').select2({
          allowClear: true
        });
    });
  </script>
 

@endsection