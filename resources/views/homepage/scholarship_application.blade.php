@extends('layouts.homepage_layout')
@section('content')
<style>
    label {
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
                                                            <h4 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 30px ;">SCHOLARSHIP APPLICATION FORM</h4>
                                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Kindly fill the form below to complete your application.</span>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                            </div>
                                            @include('homepage.flash_message')
                                            <div class="gdlr-core-accordion-item-tab clearfix gdlr-core-active">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Student Information</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-60">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <label for="">Matric Number</label>
                                                                        <input type="text" class="my_input" value="" name="matric_number" placeholder="Matric Number" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Parent's Information </h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <p class="gdlr-core-course-column gdlr-core-column-full">Father's Information</p>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Full name</label>
                                                                <input type="text" class="my_input" value="" name="fathers_name" placeholder="Father's Name" required />
                                                            </div>
                                                        </div>


                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Place of work</label>
                                                                <input type="text" class="my_input" value="" name="fathers_place_of_work" placeholder="Father's place of work" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Role at work</label>
                                                                <input type="text" class="my_input" value="" name="fathers_role_at_work" placeholder="Father's role at work" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Monthly Income</label>
                                                                <input type="text" class="my_input" value="" name="fathers_monthly_income" placeholder="Father's monthly income" />
                                                            </div>
                                                        </div>

                                                        <p class="gdlr-core-course-column gdlr-core-column-50"><br><br> Mother's Information</p>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Full name</label>
                                                                <input type="text" class="my_input" value="" name="mothers_name" placeholder="Mother's Name" required />
                                                            </div>
                                                        </div>


                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Place of work</label>
                                                                <input type="text" class="my_input" value="" name="mothers_place_of_work" placeholder="Mother's place of work" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Role at work</label>
                                                                <input type="text" class="my_input" value="" name="mothers_role_at_work" placeholder="Mother's role at work" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Monthly Income</label>
                                                                <input type="text" class="my_input" value="" name="mothers_monthly_income" placeholder="Mother's monthly income" />
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Sponsor's Information </h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">Who is your sponsor?</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" id="spns" name="sponsor" required>
                                                                        <option value="father">Father</option>
                                                                        <option value="mother">Mother</option>
                                                                        <option value="other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="display: none;" id="sps_container">
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Full name</label>
                                                                    <input type="text" class="my_input" value="" name="sponsors_name" placeholder="Sponsor's Name" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Place of work</label>
                                                                    <input type="text" class="my_input" value="" name="sponsors_place_of_work" placeholder="Sponsor's place of work" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Role at work</label>
                                                                    <input type="text" class="my_input" value="" name="sponsors_role_at_work" placeholder="Sponsor's role at work" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Monthly Income</label>
                                                                    <input type="text" class="my_input" value="" name="sponsors_monthly_income" placeholder="Sponsor's monthly income" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Relationship with student</label>
                                                                    <input type="text" class="my_input" value="" name="sponsors_relationship" placeholder="Sponsor's Relationship With Student" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Application Letter</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-60">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="" class="gdlr-core-column-60">Why you need a scholarship? <small>(Application letter 100 words).</small></label>
                                                                <textarea name="application_letter" style="background-color: #3b4b6b; color: #b1c0e0" class="gdlr-core-column-30 input1 scholarship" cols="20" rows="10" required></textarea>
                                                                <!-- <input type="text" value="" name="sponsors_name" placeholder="Sponsor's Name" /> -->
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @csrf
                                            <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                                <!-- <input  value="Submit" /> -->
                                                <button type="submit" id="submit_form" class="gdlr-core-button">Submit</button>
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

    $('#submit_form').click(function() {
        $('.gdlr-core-accordion-item-tab').addClass('gdlr-core-active')
    })

    $('#spns').change(function() {
        let spns = $(this).find(":selected").val()
        if (spns !== 'other') {
            $('#sps_container').slideUp()
        } else {
            $('#sps_container').slideDown()
        }
    })

    $('.close').click(function(){
        $('#close_alert').slideUp()
    })
</script>

@endsection