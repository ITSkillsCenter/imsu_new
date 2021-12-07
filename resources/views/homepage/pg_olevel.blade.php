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

    #addInst,
    #remInst {
        background-color: green;
        color: white;
        border-radius: 5px;
        height: 42px;
        width: 42px;
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
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 30px ;">EDUCATION DETAILS </h3>
                                                        </div>
                                                        <!-- <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">[Not more than two (2) sittings]</span> -->
                                                    </div>
                                                </div>

                                            </div>

                                            @php
                                                $prev = json_decode($std->previous_education, true);
                                                $ct = 1;
                                            @endphp
                                            <input type="hidden" id="ct"  value="{{$prev ? count($prev) : 1}}">
                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">PREVIOUS EDUCATION DETAILS </h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-50">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for=""></label>
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <h3>Institution <span><button id="addInst" type="button">+</button> <button id="remInst" {{$std->previous_education ? '' : 'disabled'}} type="button">-</button></span></h3>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if($std->previous_education == null)
                                                        <div class="gdlr-core-course-column gdlr-core-column-50">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for=""></label>
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <p>Institution 1</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Name</label>
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <input type="text" class="my_input" value="" name="prevedu[1][name]" placeholder="Imo state university" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Programme Studied</label>
                                                                <input type="text" class="my_input" name="prevedu[1][programme_studied]" value="" required />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Qualification</label>
                                                                <input type="text" class="my_input" name="prevedu[1][qualification]" value="" required />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Grade Achieved</label>
                                                                <input type="text" class="my_input" name="prevedu[1][grade_achieved]" value="" required />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Duration of studies</label>
                                                                <input type="text" class="my_input" name="prevedu[1][duration_of_studies]" value="" required />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Date of award</label>
                                                                <input type="date" class="my_input" name="prevedu[1][date_of_award]" value="" required />
                                                            </div>
                                                        </div>

                                                        @endif

                                                        <div id="body">
                                                            @if($std->previous_education !== null)
                                                                
                                                                @foreach($prev as $single)
                                                                <div class="child">
                                                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for=""></label>
                                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                                <p>Institution {{$ct}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for="">Name</label>
                                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                                <input type="text" class="my_input" value="{{$single['name']}}" name="prevedu[{{$ct}}][name]" placeholder="Imo state university" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for="">Programme Studied</label>
                                                                            <input type="text" class="my_input" name="prevedu[{{$ct}}][programme_studied]" value="{{$single['programme_studied']}}" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for="">Qualification</label>
                                                                            <input type="text" class="my_input" name="prevedu[{{$ct}}][qualification]" value="{{$single['qualification']}}" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for="">Grade Achieved</label>
                                                                            <input type="text" class="my_input" name="prevedu[{{$ct}}][grade_achieved]" value="{{$single['grade_achieved']}}" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for="">Duration of studies</label>
                                                                            <input type="text" class="my_input" name="prevedu[{{$ct}}][duration_of_studies]" value="{{$single['duration_of_studies']}}" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                            <label for="">Date of award</label>
                                                                            <input type="date" class="my_input" name="prevedu[{{$ct++}}][date_of_award]" value="{{$single['date_of_award']}}" required />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">O'LEVEL DETAILS </h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        @php

                                                        $olevel = json_decode($std->olevel, true);
                                                        $q = 1; $u = 1;
                                                        @endphp
                                                        <div class="gdlr-core-course-column gdlr-core-column-30">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">1st Exams Result</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="olevel[1][exam_type]" id="exam_type_1" required>
                                                                        <option value="">Select exam type</option>
                                                                        <option value="waec" {{($olevel !== null) ? ($olevel[1]['exam_type'] == 'waec') ? 'selected' : '' : ''}}>WAEC</option>
                                                                        <option value="neco" {{($olevel !== null) ? ($olevel[1]['exam_type'] == 'neco') ? 'selected' : '' : ''}}>NECO</option>
                                                                        <option value="gce" {{($olevel !== null) ? ($olevel[1]['exam_type'] == 'gce') ? 'selected' : '' : ''}}>GCE</option>
                                                                        <option value="nabteb" {{($olevel !== null) ? ($olevel[1]['exam_type'] == 'nabteb') ? 'selected' : '' : ''}}>NABTEB</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div style="display: {{$olevel !== null ? 'block' : 'none'}};" id="content_1">
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <label for="">School:</label>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <input type="text" class="my_input" value="{{($olevel !== null) ? $olevel[1]['school'] : ''}}" name="olevel[1][school]" placeholder="Name of school" required />
                                                                    </div>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <label for="">Exam Number:</label>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <input type="text" class="my_input" value="{{($olevel !== null) ? $olevel[1]['exam_number'] : ''}}" name="olevel[1][exam_number]" placeholder="Exam Number" required />
                                                                    </div>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <label for="">Year:</label>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <input type="text" class="my_input" value="{{($olevel !== null) ? $olevel[1]['year'] : ''}}" name="olevel[1][year]" placeholder="Year" required />
                                                                    </div>
                                                                </div>

                                                                <div class="gdlr-core-course-column gdlr-core-column-full">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <table>
                                                                            <thead>
                                                                                <th class="text-center">#</th>
                                                                                <th class="text-center">Subject</th>
                                                                                <th class="text-center">Grade</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if($olevel == null)
                                                                                @for($i = 1; $i<=9; $i++) <tr>
                                                                                    <td>{{$i}}</td>
                                                                                    <td>
                                                                                        <select class="gdlr-core-skin-e-content my_input2" style="width: 90%;" name="olevel[1][exams][subject][]">
                                                                                            <option value="">Select Subject</option>
                                                                                            @foreach($subjects as $subject)
                                                                                            <option value="{{$subject}}">{{$subject}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="gdlr-core-skin-e-content my_input2" name="olevel[1][exams][grade][]">
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
                                                                                    @else
                                                                                    @foreach($olevel[1]['exams']['subject'] as $key => $value)
                                                                                    <tr>
                                                                                        <td>{{$q++}}</td>
                                                                                        <td>
                                                                                            <select class="gdlr-core-skin-e-content my_input2" style="width: 90%;" name="olevel[1][exams][subject][]">
                                                                                                <option value="">Select Subject</option>
                                                                                                @foreach($subjects as $subject)
                                                                                                <option value="{{$subject}}" {{$value == $subject ? 'selected' : ''}}>{{$subject}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <select class="gdlr-core-skin-e-content my_input2" name="olevel[1][exams][grade][]">
                                                                                                <option value="">Select grade</option>
                                                                                                <!-- <option value="Awaiting">Awaiting Result</option> -->
                                                                                                <option value="A1" {{$olevel[1]['exams']['grade'][$key] == 'A1' ? 'selected' : ''}}>A1</option>
                                                                                                <option value="B2" {{$olevel[1]['exams']['grade'][$key] == 'B2' ? 'selected' : ''}}>B2</option>
                                                                                                <option value="B3" {{$olevel[1]['exams']['grade'][$key] == 'B3' ? 'selected' : ''}}>B3</option>
                                                                                                <option value="C4" {{$olevel[1]['exams']['grade'][$key] == 'C4' ? 'selected' : ''}}>C4</option>
                                                                                                <option value="C5" {{$olevel[1]['exams']['grade'][$key] == 'C5' ? 'selected' : ''}}>C5</option>
                                                                                                <option value="C6" {{$olevel[1]['exams']['grade'][$key] == 'C6' ? 'selected' : ''}}>C6</option>
                                                                                                <option value="D7" {{$olevel[1]['exams']['grade'][$key] == 'D7' ? 'selected' : ''}}>D7</option>
                                                                                                <option value="E8" {{$olevel[1]['exams']['grade'][$key] == 'E8' ? 'selected' : ''}}>E8</option>
                                                                                                <option value="F9" {{$olevel[1]['exams']['grade'][$key] == 'F9' ? 'selected' : ''}}>F9</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                    @for($i = $q; $i<=9; $i++) 
                                                                                        <tr>
                                                                                            <td>{{$i}}</td>
                                                                                            <td>
                                                                                                <select class="gdlr-core-skin-e-content my_input2" style="width: 90%;" name="olevel[1][exams][subject][]">
                                                                                                    <option value="">Select Subject</option>
                                                                                                    @foreach($subjects as $subject)
                                                                                                    <option value="{{$subject}}">{{$subject}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <td>
                                                                                                <select class="gdlr-core-skin-e-content my_input2" name="olevel[1][exams][grade][]">
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
                                                                                    @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-30">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">2nd Exams Result</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="olevel[2][exam_type]" id="exam_type_2">
                                                                        <option value="">Select exam type</option>
                                                                        <option value="waec" {{($olevel[2] !== null) ? ($olevel[2]['exam_type'] == 'waec') ? 'selected' : '' : ''}}>WAEC</option>
                                                                        <option value="neco" {{($olevel[2] !== null) ? ($olevel[2]['exam_type'] == 'neco') ? 'selected' : '' : ''}}>NECO</option>
                                                                        <option value="gce" {{($olevel[2] !== null) ? ($olevel[2]['exam_type'] == 'gce') ? 'selected' : '' : ''}}>GCE</option>
                                                                        <option value="nabteb" {{($olevel[2] !== null) ? ($olevel[2]['exam_type'] == 'nabteb') ? 'selected' : '' : ''}}>NABTEB</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div style="display: {{($olevel[2] !== null) ? 'block' : 'none'}};" id="content_2">
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <label for="">School:</label>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <input type="text" class="my_input" value="{{($olevel !== null) ? $olevel[2]['school'] : ''}}" name="olevel[2][school]" placeholder="Name of school" />
                                                                    </div>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <label for="">Exam Number:</label>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <input type="text" class="my_input" value="{{($olevel !== null) ? $olevel[1]['exam_number'] : ''}}" name="olevel[2][exam_number]" placeholder="Exam Number" />
                                                                    </div>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <label for="">Year:</label>
                                                                </div>
                                                                <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <input type="text" class="my_input" value="{{($olevel !== null) ? $olevel[1]['year'] : ''}}" name="olevel[2][year]" placeholder="Year" />
                                                                    </div>
                                                                </div>

                                                                <table class="gdlr-core-course-column gdlr-core-column-full">
                                                                    <thead>
                                                                        <th class="text-center">#</th>
                                                                        <th class="text-center">Subject</th>
                                                                        <th class="text-center">Grade</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if($olevel == null)
                                                                            @for($i = 1; $i<=9; $i++) 
                                                                                <tr>
                                                                                    <td>{{$i}}</td>
                                                                                    <td>
                                                                                        <select class="gdlr-core-skin-e-content my_input2" style="width: 90%;" name="olevel[2][exams][subject][]">
                                                                                            <option value="">Select Subject</option>
                                                                                            @foreach($subjects as $subject)
                                                                                            <option value="{{$subject}}">{{$subject}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="gdlr-core-skin-e-content my_input2" name="olevel[2][exams][grade][]">
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
                                                                        @else
                                                                            @foreach($olevel[2]['exams']['subject'] as $key => $value)
                                                                            <tr>
                                                                                <td>{{$u++}}</td>
                                                                                <td>
                                                                                    <select class="gdlr-core-skin-e-content my_input2" style="width: 90%;" name="olevel[2][exams][subject][]">
                                                                                        <option value="">Select Subject</option>
                                                                                        @foreach($subjects as $subject)
                                                                                        <option value="{{$subject}}" {{$value == $subject ? 'selected' : ''}}>{{$subject}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <select class="gdlr-core-skin-e-content my_input2" name="olevel[2][exams][grade][]">
                                                                                        <option value="">Select grade</option>
                                                                                        <!-- <option value="Awaiting">Awaiting Result</option> -->
                                                                                        <option value="A1" {{$olevel[1]['exams']['grade'][$key] == 'A1' ? 'selected' : ''}}>A1</option>
                                                                                        <option value="B2" {{$olevel[1]['exams']['grade'][$key] == 'B2' ? 'selected' : ''}}>B2</option>
                                                                                        <option value="B3" {{$olevel[1]['exams']['grade'][$key] == 'B3' ? 'selected' : ''}}>B3</option>
                                                                                        <option value="C4" {{$olevel[1]['exams']['grade'][$key] == 'C4' ? 'selected' : ''}}>C4</option>
                                                                                        <option value="C5" {{$olevel[1]['exams']['grade'][$key] == 'C5' ? 'selected' : ''}}>C5</option>
                                                                                        <option value="C6" {{$olevel[1]['exams']['grade'][$key] == 'C6' ? 'selected' : ''}}>C6</option>
                                                                                        <option value="D7" {{$olevel[1]['exams']['grade'][$key] == 'D7' ? 'selected' : ''}}>D7</option>
                                                                                        <option value="E8" {{$olevel[1]['exams']['grade'][$key] == 'E8' ? 'selected' : ''}}>E8</option>
                                                                                        <option value="F9" {{$olevel[1]['exams']['grade'][$key] == 'F9' ? 'selected' : ''}}>F9</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            @for($i = $u; $i<=9; $i++) 
                                                                                <tr>
                                                                                    <td>{{$i}}</td>
                                                                                    <td>
                                                                                        <select class="gdlr-core-skin-e-content my_input2" style="width: 90%;" name="olevel[2][exams][subject][]">
                                                                                            <option value="">Select Subject</option>
                                                                                            @foreach($subjects as $subject)
                                                                                            <option value="{{$subject}}">{{$subject}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class="gdlr-core-skin-e-content my_input2" name="olevel[2][exams][grade][]">
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
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            @csrf
                                            <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                                <!-- <input  value="Submit" /> -->
                                                <button type="submit" onclick="return confirm('Note: If you submit this application, you will not be able to change anything on it again, are you sure you want to submit?');" id="submit_form" class="gdlr-core-button">Save and Continue</button>
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

    $('#exam_type_1').change(function() {
        let typ = $(this).find(":selected").val()
        if (typ.length > 0) {
            $('#content_1').slideDown()
        } else {
            $('#content_1').slideUp()
        }
    })

    $('#exam_type_2').change(function() {
        let typ = $(this).find(":selected").val()
        if (typ.length > 0) {
            $('#content_2').slideDown()
        } else {
            $('#content_2').slideUp()
        }
    })

    let ct = parseInt($('#ct').val())

    $('#addInst').click(function() {
        $('#remInst').attr('disabled', false)
        ct++
        let d = ct
        $('#body').append(`
            <div class="child">
                <div class="gdlr-core-course-column gdlr-core-column-50">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for=""></label>
                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                            <p>Institution ${d}</p>
                        </div>
                    </div>
                </div>

                <div class="gdlr-core-course-column gdlr-core-column-20">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for="">Name</label>
                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                            <input type="text" class="my_input" value="" name="prevedu[${d}][name]" placeholder="" required />
                        </div>
                    </div>
                </div>

                <div class="gdlr-core-course-column gdlr-core-column-20">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for="">Programme Studied</label>
                        <input type="text" class="my_input" name="prevedu[${d}][programme_studied]" value="" required />
                    </div>
                </div>

                <div class="gdlr-core-course-column gdlr-core-column-20">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for="">Qualification</label>
                        <input type="text" class="my_input" name="prevedu[${d}][qualification]" value="" required />
                    </div>
                </div>

                <div class="gdlr-core-course-column gdlr-core-column-20">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for="">Grade Achieved</label>
                        <input type="text" class="my_input" name="prevedu[${d}][grade_achieved]" value="" required />
                    </div>
                </div>

                <div class="gdlr-core-course-column gdlr-core-column-20">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for="">Duration of studies</label>
                        <input type="text" class="my_input" name="prevedu[${d}][duration_of_studies]" value="" required />
                    </div>
                </div>

                <div class="gdlr-core-course-column gdlr-core-column-20">
                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                        <label for="">Date of award</label>
                        <input type="date" class="my_input" name="prevedu[${d}][date_of_award]" value="" required />
                    </div>
                </div>
            </div>
        `)
    })

    $('#remInst').click(function() {
        let dc = $("#body").children().length
        if (dc > 0) {
            ct--
            $('#body').children().last().remove()
        }


    })
</script>

@endsection