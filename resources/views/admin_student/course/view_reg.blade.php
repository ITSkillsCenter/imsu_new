@extends('admin_student.layout')
@section('title')
Student || Course
@endsection
@section('content')

<br><br>
<section class="col-lg-12">
    <div>
        <a href="/course-registration" class="btn btn-primary">Back</a>
        <a href="/apply-for-carry-over" class="btn btn-info">Apply for Carry Over</a>
    </div>
    <div class="card">
        <div class="col-lg-12">@include('homepage.flash_message')</div>
        <h3 class="text-center col-md-12"><br> Courses registered <br></h3>
        <p class="text-center"><small>These are your registered semester courses</small></p>
        <p class="text-center">Level: {{$level}} Level &nbsp;&nbsp; | &nbsp;&nbsp; Semester: {{$semester}} &nbsp;&nbsp; | &nbsp;&nbsp;Session {{Helper::get_session($session)}}</p>
        <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
            @if(count($reg_courses)>0)
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Unit</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="">
                    @if(count($reg_courses)>0)
                    @php $sn = 1; $count = 0; @endphp
                    @foreach($reg_courses as $course)
                    @if($course->course_status !== 'pending' && $course->course_status !== 'rejected')
                    @php $count = $course->unit + $count; @endphp
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->unit}}</td>
                        <td>{{$course->type}}</td>
                        <td>
                            @if($curr_semester == $session && $semester. ' Semester' == Helper::get_sem())
                            @if($course->type !== 'compulsory')
                            <a href="/remove-course/{{$course->cid}}" class="btn btn-primary">Remove</a>
                            @endif
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right text-success">Total Unit:</td>
                        <td class="text-success" style="font-weight:1000;">{{$count}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @else
            <div class="alert alert-primary text-center">You have not registered any courses yet!</div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="col-md-12">
            @include('homepage.flash_message')
        </div>
        <h3 class="text-center col-md-12"><br> Available Courses</h3>
        <p class="text-center"><small>Select your preferred semester courses from the list below and submit to include them among your registered courses.</small></p>
        <p class="text-center">Maximum credit load: {{$manageCourseCreditUnit->max_credit_unit}} units &nbsp;&nbsp; | &nbsp;&nbsp; MIninum credit load: {{$manageCourseCreditUnit->min_credit_unit}} units</p>
        <form method="post" class="col-md-12">
            @csrf
            <br>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" id="checkall">Select all</button>
                    <button type="button" class="btn btn-primary" id="uncheckall">Unselect all</button>
                    <button type="submit" class="btn btn-primary" id="approve_selected" disabled>Submit Selected</button>
                    <input type="hidden" name="level" value="{{$level}}">
                    <input type="hidden" name="semester" value="{{$semester}}">
                    <input type="hidden" name="reg" value="register">
                    <input type="hidden" id="max-cr" value="{{$manageCourseCreditUnit->max_credit_unit}}">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody id="course_container">
                            @if(count($courses)>0)
                            @php $c_unit = 0;@endphp
                            @foreach($compulsory_courses as $course)
                            @if(!in_array($course->id, $reg_arr))
                            <tr>
                                <td>
                                    <input type="checkbox" class="stds" name="course_id[]" data-unit="{{$course->unit}}" hidden onclick="return false;" readonly checked value="{{$course->id}}">
                                    <input type="checkbox" onclick="return false;" readonly checked>
                                </td>
                                <td>{{$course->course_code}}</td>
                                <td>{{$course->course_name}}</td>
                                <td>
                                    {{$course->unit}}
                                    <input type="hidden" name="course_unit[]" value="{{$course->unit}}">
                                </td>
                            </tr>
                            @php $c_unit += $course->unit; @endphp
                            @endif
                            @endforeach
                            @if($reg_courses < 1) <tr>
                                <td colspan="3">Total compulsory unit</td>
                                <td>{{$c_unit}}</td>
                                </tr>
                                @endif
                                <td colspan="4">Elective courses</td>
                                @foreach($elective_courses as $course)
                                @if(!in_array($course->id, $reg_arr))
                                <tr>
                                    <td>
                                        <input type="checkbox" class="stds_r stds elective" data-unit="{{$course->unit}}" name="course_id[]" value="{{$course->id}}">
                                    </td>
                                    <td>{{$course->course_code}}</td>
                                    <td>{{$course->course_name}}</td>
                                    <td>
                                        {{$course->unit}}
                                        <input type="hidden" name="course_unit[]" value="{{$course->unit}}">
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @foreach($borrowed_courses as $course)
                                @if(!in_array($course->id, $reg_arr))
                                <tr>
                                    <td>
                                        <input type="checkbox" class="stds_r stds elective" data-unit="{{$course->unit}}" name="course_id[]" value="{{$course->id}}">
                                    </td>
                                    <td>{{$course->course_code}}</td>
                                    <td>{{$course->course_name}}</td>
                                    <td>
                                        {{$course->unit}}
                                        <input type="hidden" name="course_unit[]" value="{{$course->unit}}">
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <td colspan="3">Total Course Unit Selected</td>
                                    <td id="total_course_unit">{{$c_unit}}</td>
                                </tr>
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    $(document).ready(function() {
        let total = $(".stds:checkbox:checked").length
        console.log(total)
        if (total > 0) {
            $('#approve_selected').prop('disabled', false)
        } else {
            $('#approve_selected').prop('disabled', true)
        }
    })
    $('.stds_r').change(function() {
        let total = $(".stds:checkbox:checked").length
        console.log(total)
        if (total > 0) {
            $('#approve_selected').prop('disabled', false)
        } else {
            $('#approve_selected').prop('disabled', true)
        }
    })

    $('.elective').change(function() {
        let total_course_unit = $('#total_course_unit').html()
        let this_unit = $(this).data('unit')
        let new_total = 0
        let maxcr = $('#max-cr').val()
        if ($(this).is(":checked")) {
            new_total = parseInt(total_course_unit) + parseInt(this_unit)
        } else {
            new_total = parseInt(total_course_unit) - parseInt(this_unit)
        }

        // if(maxcr < new_total){
        //     $('#approve_selected').prop('disabled', true)
        //     alert('Total credit unit cannot be more than ' + maxcr)
        // }else{
        //     $('#approve_selected').prop('disabled', false)
        // }

        $('#total_course_unit').html(new_total)

    })

    $('#checkall').on('click', function() {
        $('#course_container').children().find('.stds_r:input[type="checkbox"]').prop('checked', true);
        let unit = 0
        $('.stds_r:input[type="checkbox"]').each(function() {
            unit += $(this).data('unit');
        }).get();
        $('#total_course_unit').html(unit)

        $('#approve_selected').prop('disabled', false)
    });
    $('#uncheckall').on('click', function() {
        $('#course_container').children().find('.stds_r:input[type="checkbox"]').prop('checked', false);
        let total = $(".stds:checkbox:checked").length
        console.log(total)
        if (total > 0) {
            $('#approve_selected').prop('disabled', false)
        } else {
            $('#approve_selected').prop('disabled', true)
        }

        $('#total_course_unit').html(0)
    });
</script>
@endsection