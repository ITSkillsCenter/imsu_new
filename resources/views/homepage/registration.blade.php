@extends('layouts.homepage_layout')
@section('content')
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-background-wrap">
            <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" id="div_1dd7_106" data-parallax-speed="0"></div>
        </div>
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">
                
                <div class="gdlr-core-pbf-column gdlr-core-column-60">
                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                            @include('homepage.flash_message')
                            <div class="gdlr-core-pbf-element">
                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
                                    <div class="gdlr-core-title-item-title-wrap clearfix">
                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " id="h3_1dd7_34">
                                           Returning Student Registration
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-element">
                                <div class="gdlr-core-course-search-item gdlr-core-item-pdb gdlr-core-item-pdlr ">
                                    <form class="gdlr-core-course-form clearfix" method="post">

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">First Name</label>
                                                <input type="text" placeholder="First name" name="first_name" value="" required/>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Last Name</label>
                                                <input type="text" placeholder="Last name" name="last_name" value="" required/>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Middle Name</label>
                                                <input type="text" placeholder="Middle name" name="middle_name" value="" required/>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Email Address</label>
                                                <input type="text" placeholder="Email" name="email_address" value="" required/>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Level</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="level" required>
                                                        <option value="">Select your level</option>
                                                        <option value="100">100 Level</option>
                                                        <option value="200">200 Level</option>
                                                        <option value="300">300 Level</option>
                                                        <option value="400">400 Level</option>
                                                        <option value="500">500 Level</option>
                                                        <option value="600">600 Level</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                               <label for="">Nationality</label> 
                                               <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="nationality" required>
                                                        <option value="">Nationality</option>
                                                        <option value="nigerian">Nigerian</option>
                                                        <option value="non-nigerian">Non-Nigerian</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">State of Origin</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="state_of_origin" id="state_of_origin" required>
                                                        <option value="">State of Origin</option>
                                                        @foreach($states as $state)
                                                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">LGA</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="lga" id="lga" required>
                                                        <option value="">LGA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Gender</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="gender" required>
                                                        <option value="">Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Phone Number</label>
                                                <input type="text" placeholder="Phone Number" name="student_mobile_number" value="" required/>
                                            </div>
                                        </div>

                                        

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Student Type</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="student_type" required>
                                                        <option value="">Student Type</option>
                                                        <option value="undergraduate">Undergraduate</option>
                                                        <option value="postgraduate">Postgraduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Date of Birth</label>
                                                <input type="date" placeholder="Date of Birth" name="date_of_birth" value="" required/>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Faculty</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="faculty_id" id="faculty" required>
                                                        <option value="">Faculty</option>
                                                        @foreach($faculties as $faculty)
                                                        <option value="{{$faculty->id}}" data-id="{{$faculty->id}}">{{$faculty->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Department</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="dept_id" id="departments" required>
                                                        <option value="">Department</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Department Option</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="dept_option" id="department_options">
                                                        <option value="">Department Option</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                <label for="">Group</label>
                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                    <select class="gdlr-core-skin-e-content" name="student_group" required>
                                                        <option value="">Select Group</option>
                                                        <option value="putme">PUTME</option>
                                                        <option value="direct_entry">Direct Entry (DE)</option>
                                                        <option value="masters">Masters</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Matric number</label>
                                                <input type="text" placeholder="Matric Number" name="matric_number" value="" required/>
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                            <input class="gdlr-core-full-size" type="submit" value="Register" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#state_of_origin').change(function(){
        let state_id = $(this).find(":selected").data('id')
        $('#lga')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('')
        ;
        $.post('/get_lgas',{state_id}).done(function(response){
            response.body.map((item)=>{
                $('#lga').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })

    $('#faculty').change(function(){
        let faculty_id = $(this).find(":selected").val()
        $('#department').find('option').remove().end().append('<option value="">Select department</option>').val('')
        ;
        $.post('/get_departments',{faculty_id}).done(function(response){
            response.body.map((item)=>{
                $('#departments').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

    $('#departments').change(function(){
        let dept_id = $(this).find(":selected").val()
        $('#department').find('option').remove().end().append('<option value="">Select department</option>').val('')
        $.post('/get_department_options',{dept_id}).done(function(response){
            response.body.map((item)=>{
                $('#department_options').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })
</script>
@endsection