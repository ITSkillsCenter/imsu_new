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
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 30px ;">Declaration</h3>
                                                        </div>
                                                        <!-- <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">[Not more than two (2) sittings]</span> -->
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- <div class="gdlr-core-accordion-item-tab clearfix gdlr-core-active">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">UPLOADS</h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">O'level result </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="olevelres" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Second O'level result (If applicable) </label>
                                                                <input type="file" class="my_input" placeholder="Attach Certificate" name="olevelres2" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Higher education certificate</label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="educert" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Higher education transcript </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="edutrans" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">NYSC certificate or exemption letter </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="nysccert" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Signed reference form for referee 1  </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="ref1" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Signed reference form for referee 2 </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="ref2" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Valid identity card </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="idc" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Indigene certificate </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="indig" value="" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Passport photo  </label>
                                                                <input type="file" required class="my_input" placeholder="Attach Certificate" name="passp" value="" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->

                                            <br><br>
                                            <h5>DECLARATION:</h5>
                                            <div>
                                                 <p>I confirm that the information given on this form is true, complete and accurate and no information requested or other material information has been omitted. I confirm that I have read the terms and conditions included herewith.</p>
                                                <p><input type="checkbox" style="width: 5%; margin: 0" name="" id="" required> 
                                                <span>I Accept</span> </p>
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

    $('#submit_form').click(function() {
        $('.gdlr-core-accordion-item-tab').addClass('gdlr-core-active')
    })
</script>

@endsection