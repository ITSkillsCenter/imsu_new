@extends('layouts.homepage_layout')
@section('content')
<style>
    label {
        color: #3b4b6b;
    }
    .gdlr-core-course-form input {
        font-size: 14px;
        padding: 9px 22px;
        width: 100%;
        border: 0px;
        /* line-height: 1.7; */
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }
</style>
@php
$subjects = [
'ARABIC','AGRICULTURAL SCIENCE','AUTO PARTS MERCHANDISING','AUTO MECHANICS','AUTO MECHANICAL WORK','AUTO ELECTRICAL WORK',
'AUTO BODY REPAIRS AND SPRAY PAINTING','APPLIED ELECTRICITY OR BASIC ELECTRICITY','ANIMAL HUSBANDRY','BUSINESS MANAGEMENT',
'BUILDING CONSTRUCTION','BOOK KEEPING','BLOCKLAYING, BRICKLAYING AND CONCRETING','BIOLOGY','BASKETRY','CROP HUSBANDRY AND HORTICULTURE',
'COSMETOLOGY','COMPUTER STUDIES','COMMERCE','CLOTHING AND TEXTILES','CLERICAL OFFICE DUTIES','CIVIC EDUCATION',
'CHRISTIAN RELIGIOUS STUDIES','CHEMISTRY','CERAMICS','CATERING CRAFT PRACTICE','CAPENTRY AND JOINERY','DYEING & BLEACHING',
'DATA PROCESSING','ENGLISH LANGUAGE','ELECTRONICS OR BASIC ELECTRONICS','ELECTRICAL INSTALLATION AND MAINTENANCE','EFIK',
'EDO','ECONOMICS','FURTHER MATHEMATICS','FURNITURE MAKING','FRENCH','FORESTRY','FOODS AND NUTRITION','FISHERIES',
'FINANCIAL ACCOUNTING','TYPEWRITING','TOURISM','TEXTILES','TECHNICAL DRAWING','STORE MANAGEMENT','STORE KEEPING WAEC',
'SOCIAL STUDIES','SHORTHAND','SCULPTURE','SALESMANSHIP','REFRIGERATION AND AIR CONDITIONING','RADIO,TELEVISION AND ELECTRONICS WORKS',
'PRINTING CRAFT PRACTICE','PRINCIPLES OF COST ACCOUNTING','PLUMBING AND PIPE FITTING','PICTURE MAKING','PHYSICS','PHYSICAL EDUCATION',
'PHOTOGRAPHY','PAINTING AND DECORATING','OFFICE PRACTICE','MUSIC','MINING','METALWORK','MARKETING','MACHINE WOODWORKING',
'LITERATURE IN ENGLISH','LEATHERWORK','LEATHER GOODS','JEWELLERY','ISLAMIC RELIGIOUS STUDIES','INTEGRATED SCIENCE','INSURANCE',
'INFORMATION AND COMMUNICATION TECHNOLOGY','IGBO','IBIBIO','HOME MANAGEMENT','HISTORY','HEALTH EDUCATION OR HEALTH SCIENCE','HAUSA',
'GSM PHONES MAINTENANCE AND REPAIRS','GRAPHIC DESIGN','GOVERNMENT','GHANAIAN LANGUAGES','GEOGRAPHY','GENERAL MATHEMATICS OR MATHEMATICS',
'GENERAL KNOWLEDGE IN ART','GENERAL AGRICULTURE','GARMENT MAKING','VISUAL ART','UPHOLSTERY','WOODWORK','WEST AFRICAN TRADITIONAL RELIGION',
'WELDING AND FABRICATION ENGINEERING CRAFT PRACTICE','YORUBA'
];

@endphp
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

                                            <div class="gdlr-core-accordion-item-tab clearfix gdlr-core-active">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                                        <div class="gdlr-core-title-item-title-wrap clearfix">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">O'Level Qualifications</h3>
                                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">[Not more than two (2) sittings]</span>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-course-column gdlr-core-column-30">
                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                        <label for="">1st Exams Result</label>
                                                        <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                            <select class="gdlr-core-skin-e-content my_input2" name="exam_type_1" id="exam_type_1" required>
                                                                <option value="">Select exam type</option>
                                                                <option value="waec">WAEC</option>
                                                                <option value="neco">NECO</option>
                                                                <option value="gce">GCE</option>
                                                                <option value="nabteb">NABTEB</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div style="display: none;" id="content_1">
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <label for="">School:</label>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <input type="text" class="my_input" value="" name="school_1" placeholder="Name of school" required/>
                                                            </div>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <label for="">Exam Number:</label>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <input type="text" class="my_input" value="" name="exam_number_1" placeholder="Exam Number" required />
                                                            </div>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <label for="">Year:</label>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <input type="text" class="my_input" value="" name="year_1" placeholder="Year" required/>
                                                            </div>
                                                        </div>

                                                        <table>
                                                            <thead>
                                                                <th class="text-center">#</th>
                                                                <th class="text-center">Subject</th>
                                                                <th class="text-center">Grade</th>
                                                            </thead>
                                                            <tbody>
                                                                @for($i = 1; $i<=9; $i++)
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="exams[1][subject][]">
                                                                            <option value="">Select Subject</option>
                                                                            @foreach($subjects as $subject)
                                                                            <option value="{{$subject}}">{{$subject}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="exams[1][grade][]">
                                                                            <option value="">Select grade</option>
                                                                            <option value="Awaiting">Awaiting Result</option>
                                                                            <option value="A1">A1</option>
                                                                            <option value="B2">B2</option>
                                                                            <option value="B3">B3</option>
                                                                            <option value="C4">C4</option>
                                                                            <option value="C5">C5</option>
                                                                            <option value="C6">C6</option>
                                                                            <option value="D7">D7</option>
                                                                            <option value="E8">E8</option>
                                                                            <option value="F9">F9</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                </div>

                                                <div class="gdlr-core-course-column gdlr-core-column-30">
                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                        <label for="">2nd Exams Result</label>
                                                        <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                            <select class="gdlr-core-skin-e-content my_input2" name="exam_type_2" id="exam_type_2">
                                                                <option value="">Select exam type</option>
                                                                <option value="waec">WAEC</option>
                                                                <option value="neco">NECO</option>
                                                                <option value="gce">GCE</option>
                                                                <option value="nabteb">NABTEB</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div style="display: none;" id="content_2">
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <label for="">School:</label>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <input type="text" class="my_input" value="" name="school_2" placeholder="Name of school"/>
                                                            </div>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <label for="">Exam Number:</label>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <input type="text" class="my_input" value="" name="exam_number_2" placeholder="Exam Number"/>
                                                            </div>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <label for="">Year:</label>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <input type="text" class="my_input" value="" name="year_2" placeholder="Year"/>
                                                            </div>
                                                        </div>

                                                        <table>
                                                            <thead>
                                                                <th class="text-center">#</th>
                                                                <th class="text-center">Subject</th>
                                                                <th class="text-center">Grade</th>
                                                            </thead>
                                                            <tbody>
                                                                @for($i = 1; $i<=9; $i++)
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="exams[2][subject][]">
                                                                            <option value="">Select Subject</option>
                                                                            @foreach($subjects as $subject)
                                                                            <option value="{{$subject}}">{{$subject}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="exams[2][grade][]">
                                                                            <option value="">Select grade</option>
                                                                            <option value="Awaiting">Awaiting Result</option>
                                                                            <option value="A1">A1</option>
                                                                            <option value="B2">B2</option>
                                                                            <option value="B3">B3</option>
                                                                            <option value="C4">C4</option>
                                                                            <option value="C5">C5</option>
                                                                            <option value="C6">C6</option>
                                                                            <option value="D7">D7</option>
                                                                            <option value="E8">E8</option>
                                                                            <option value="F9">F9</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- For Direct Entry --}}
                                            @if ($application && $application->mode_of_admission == 'Direct Entry')
                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Higher Education Information</h4>
                                                    <div class="gdlr-core-accordion-item-content">
    
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Higher Institution Attended</label>
                                                                <input type="text" class="my_input" placeholder="Higher Institution Attendd" name="higher_institution_attended" required value="{{$application->higher_institution_attended}}" />
                                                            </div>
                                                        </div>
    
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Programme Studied</label>
                                                                <input type="text" class="my_input" placeholder="Programme Studied" name="programme_studied" required value="{{$application->programme_studied}}" />
                                                            </div>
                                                        </div>
    
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Certificate Obtained</label>
                                                                <input type="text" class="my_input" placeholder="Certificate Obtained" required name="certificate_obtained" value="{{$application->certificate_obtained}}" />
                                                            </div>
                                                        </div>
    
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Grade Achieved</label>
                                                                <input type="text" required class="my_input" placeholder="Grade Achieved" name="grade_achieved" value="{{$application->grade_achieved}}" />
                                                            </div>
                                                        </div>
    
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Attach Certificate </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="attach_certificate" value="{{$application->attach_certificate}}" />
                                                            </div>
                                                        </div>
    
                                                       
                                                    </div>
                                                </div>
                                            </div> 
                                            @endif
                                          

                                            @csrf
                                            <br><br>
                                            <h5>ATTESTATION:</h5>
                                            <div>
                                                 <p>I hereby attest that the information given above is correct to the best of my knowledge. I however understand that if the information above is found to be false, it will lead to the disqualification of my application</p>
                                                <p><input type="checkbox" style="width: 5%; margin: 0" name="accept" id="" required> 
                                                <span>I Accept</span> </p>
                                            </div>
                                             
                                            <br>
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

    $('#submit_form').click(function() {
        $('.gdlr-core-accordion-item-tab').addClass('gdlr-core-active')
    })

    $('#exam_type_1').change(function(){
        let typ = $(this).find(":selected").val()
        if(typ.length > 0){
            $('#content_1').slideDown()
        }else{
            $('#content_1').slideUp()
        }
    })

    $('#exam_type_2').change(function(){
        let typ = $(this).find(":selected").val()
        if(typ.length > 0){
            $('#content_2').slideDown()
        }else{
            $('#content_2').slideUp()
        }
    })
</script>

@endsection