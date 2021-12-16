@extends('layouts.master',['title'=>'Create Article'])
@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Create'. ucfirst($type),'Title'=>ucfirst($type)])

    <div class="row">
        <div class="col-md-12">
            @include('homepage.flash_message')
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7 col-lg-7">

                        <div class="card no-margin-bottom">
                            <div class="card-header">
                                <div class="card-title">Create New {{ucfirst($type)}}</div>
                            </div>
                            <div class="card-body" id="create-article">

                                <div class="form-group">
                                    <label for="title">{{$type == 'email'? 'Title' : 'From'}}:</label>
                                    <input type="text" class="form-control" name="subject" id="title" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Role:</label>
                                    <select name="role" id="type" class="form-control" required>
                                        <option value="">Select Role</option>
                                        <option value="all_staffs">All Staffs</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                        @endforeach
                                        <option value="student">Student</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Faculty:</label>
                                    <select name="faculty" id="faculty_hello" class="form-control">
                                        <option value="all">All</option>
                                        @foreach($faculties as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Department:</label>
                                    <select name="department" id="departments" class="form-control">
                                        <option value="all">All</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="level">Level:</label>
                                    <select name="level" id="levels" class="form-control">
                                        <option value="all">All</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                        <option value="500">500</option>
                                        <option value="600">600</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Body:</label>
                                    @if($type == 'email')
                                    <textarea name="body" id="editor1" class="form-control"></textarea>
                                    @else
                                    <textarea name="body" class="form-control"></textarea>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <!-- <label for="title">Start Date (For events):</label> -->
                                    <input type="hidden" class="form-control" id="selected_type" value="{{$type}}">
                                </div>



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-5">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Receivers
                                    <button type="button" class="btn btn-primary btn-sm" id="checkall">Select all</button>
                                    <button type="button" class="btn btn-primary btn-sm" id="uncheckall">Unselect all</button>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row" id="receivers" style="max-height: 1000px; overflow-y:scroll;">

                                </div>
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
<script src="{{ URL::asset('admin_student/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor1', {
        height: 500
    });

    $('#checkall').on('click', function() {
        $('#receivers').children().find('.selected_receivers:input[type="checkbox"]').prop('checked', true);
        $('#receivers').children().find('.selected_ids:input[type="checkbox"]').prop('checked', true);
    });
    $('#uncheckall').on('click', function() {
        $('#receivers').children().find('.selected_receivers:input[type="checkbox"]').prop('checked', false);
        $('#receivers').children().find('.selected_ids:input[type="checkbox"]').prop('checked', false);
    });

    function selectNearest(id){
        // console.log($('#div'+id).children().find('.selected_ids:input[type="checkbox"]'))
        if($('#div'+id).children('.selected_receivers').prop("checked")){
            $('#div'+id).children('.selected_ids').prop('checked', true)
        }else{
            $('#div'+id).children('.selected_ids').prop('checked', false)
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#faculty_hello').change(function() {
        let faculty_id = $(this).find(":selected").val()
        $('#departments').find('option').remove().end().append('<option value="all" selected>All</option>').val('');
        $.post('/get_departments', {
            faculty_id
        }).done(function(response) {
            response.body.map((item) => {
                $('#departments').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

    $('#departments, #faculty_hello, #type, #levels').on('blur', function() {
        let faculty_id = $("#faculty_hello").find(":selected").val()
        let dept_id = $("#departments").find(":selected").val()
        let type = $("#type").find(":selected").val()
        let level = $("#levels").find(":selected").val()
        let selected_type = $('#selected_type').val();
        $.post('/get_receivers/{{$type}}', {
            faculty_id,
            dept_id,
            type,
            level
        }).done(function(response) {
            $('#receivers').html('')
            if (selected_type == 'email') {
                response.body.map((item) => {
                    $('#receivers').append(`
                        <div class="col-lg-6" id="div${item.id}">
                            <input type="checkbox" name="selected_receivers[]" class="selected_receivers" onClick="selectNearest(${item.id})" value="${item.email || item.Email_Address}" checked>${item.email || item.Email_Address}
                            <input type="checkbox" name="selected_ids[]"  class="selected_ids" hidden value="${item.id}" checked>
                        </div>
                    `)
                })
            } else {
                if (type == 'student') {
                    response.body.map((item) => {
                        if(item.Student_Mobile_Number !== null && item.Student_Mobile_Number.length == 11){
                            $('#receivers').append(`
                                <div class="col-lg-6">
                                    <input type="checkbox" name="selected_receivers[]" value="${item.Student_Mobile_Number}" class="selected_receivers" checked>${item.Student_Mobile_Number}
                                    <input type="hidden" name="selected_ids[]" value="${item.id}" class="selected_receivers">
                                </div>
                            `)
                        }
                    })
                } else {
                    $('#receivers').html(`N/A`)
                }

            }

        });
    })
</script>

@endsection