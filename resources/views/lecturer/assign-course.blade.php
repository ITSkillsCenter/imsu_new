@extends('layouts.master',['title'=>'Assign Course'])


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Assign Course
        ','Title'=>'Course'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Assign Course</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('homepage.flash_message')
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <form class="form-horizontal form-label-left" method="post"
                                action="{{ URL::route('lecturerAssignCourse.store') }}">
                                @csrf
                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                <div class="row">

                          
                                    <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Lecturer <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              <select name="lecturer_id" class="form-control">
                                                  @if($lecturerData)
                                                    <option value="{{$lecturerData->id}}">{{$lecturerData->user->name}} ({{$lecturerData->user->faculty->name}}</option>
                                                  @else
                                                  <option> Select Lecturer</option>
                                                  @endif

                                                @forelse ($lecturers as $lecturer)
                                                  <option value="{{$lecturer->id}}">{{$lecturer->user->name}} ({{$lecturer->user->faculty->name}})</option> 
                                                @empty
                                                    
                                                @endforelse
                                              </select>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('lecturer_id') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Departments <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              <select name="department_id" class="form-control" id="department">
                                                  <option> Select Department</option>
                                                @forelse ($departments as $department)
                                                  <option value="{{$department->id}}">{{$department->name}} </option> 
                                                @empty
                                                    
                                                @endforelse
                                              </select>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Courses <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              <select name="course_id" class="form-control" id="course_select_select">
                                                  <option> Select Course</option>

                                              </select>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                        </div>
                                    </div>
    
                                    {{-- <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Course <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              <select name="course_id" class="form-control">
                                                  <option> Select Course</option>
                                                @forelse ($courses as $course)
                                                  <option value="{{$course->id}}">{{$course->course_name}} ({{$course->course_code}})</option> 
                                                @empty
                                                    
                                                @endforelse
                                              </select>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('lecturer_id') }}</span>
                                        </div>
                                    </div>
     --}}
                                  
                                
                                   
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success" type="submit">Assign</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Return Back</a>
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

<script>
    // when country dropdown changes
    $('#department').change(function() {

        var deptID = $(this).val();

        if (deptID) {

            $.ajax({
                type: "GET",
                url: "{{ url('get-courses-list-json') }}?department_id=" + deptID,
                success: function(res) {

                    if (res) {

                        $("#course_select_select").empty();
                        $("#course_select_select").append('<option>Select Course</option>');
                        $.each(res, function(key, value) {
                            $("#course_select_select").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {

                        $("#course_select_select").empty();
                    }
                }
            });
        } else {

            $("#course_select_select").empty();
            // $("#city").empty();
        }
    });

    // // when state dropdown changes
    // $('#state').on('change', function() {

    //     var stateID = $(this).val();

    //     if (stateID) {

    //         $.ajax({
    //             type: "GET",
    //             url: "{{ url('getCity') }}?state_id=" + stateID,
    //             success: function(res) {

    //                 if (res) {
    //                     $("#city").empty();
    //                     $("#city").append('<option>Select City</option>');
    //                     $.each(res, function(key, value) {
    //                         $("#city").append('<option value="' + key + '">' + value +
    //                             '</option>');
    //                     });

    //                 } else {

    //                     $("#city").empty();
    //                 }
    //             }
    //         });
    //     } else {

    //         $("#city").empty();
    //     }
    // });

</script>

@endsection