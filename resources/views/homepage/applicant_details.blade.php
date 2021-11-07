@extends('layouts.homepage_layout')
@section('content')
<style>
    label{
        color: #3b4b6b;
    }
</style>
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">
                <div class="gdlr-core-course-search-item gdlr-core-item-pdb gdlr-core-item-pdlr ">
                    <form class="gdlr-core-course-form clearfix" method="post" enctype="multipart/form-data">
                        <div class="gdlr-core-pbf-column gdlr-core-column-full">
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                    <div class="gdlr-core-pbf-element">
                                        <div class="class_style gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-background-title-icon gdlr-core-left-align gdlr-core-icon-pos-right">
                                            <div class="gdlr-core-accordion-item-tab clearfix  gdlr-core-active">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                                        <div class="gdlr-core-title-item-title-wrap clearfix">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">Applicant details</h3>
                                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello  <b>{{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}}</b>, kindly fill the form below to complete your registration.</span>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Basic Information (Some Fields Are Not Editable)</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                                           
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Full Name</label>
                                                                    <p>{{$std->full_name}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Jamb Registration Number</label>
                                                                    <p>{{Session::get('jamb_reg')}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Jamb Score</label>
                                                                    <p>{{$std->jamb_score}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Email Address</label>
                                                                    <input type="text" class="my_input" placeholder="" name="email" value="{{$std->email}}"/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Phone Number</label>
                                                                    <input type="tel" class="my_input" name="phone_number" value="{{$std->phone_number}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @csrf
                                            <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                                <!-- <input  value="Submit" /> -->
                                                <button type="submit" id="submit_form" class="gdlr-core-button">Save and Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="/student_registration" style="display: none;" id="clickme">Click to Open Success Modal</a> -->
    <!-- <a href="#" id="clickme2">Click to Open fail Modal</a> -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#submit_form').click(function(){
        $('.gdlr-core-accordion-item-tab').addClass('gdlr-core-active')
    })

    $('#faculty').change(function(){
        let faculty_id = $(this).find(":selected").val()
        $('#departments').find('option').remove().end().append('<option value="">Select department</option>').val('')
        ;
        $.post('/get_departments',{faculty_id}).done(function(response){
            response.body.map((item)=>{
                $('#departments').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

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

    $('#state_of_residence').change(function(){
        let state_id = $(this).find(":selected").data('id')
        $('#lga_of_residence')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('')
        ;
        $.post('/get_lgas',{state_id}).done(function(response){
            response.body.map((item)=>{
                $('#lga_of_residence').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })

</script>

@endsection