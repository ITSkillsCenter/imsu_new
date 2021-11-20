@extends('layouts.homepage_layout')
@section('content')
<style>
    label {
        color: #3b4b6b;
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
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">Candidate's Particulars</h3>
                                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Note: Fill the form appropriately</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-primary" id="show_receipt">Receipt</button>
                                                </div>
                                                <br>
                                                <div id="preview" style="display:none;">
                                                    <div class="gdlr-core-course-form clearfix element-to-print" id="preview_page" style="padding: 10px; border: 1px solid black;">
                                                        <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:center">
                                                            <img class="gdlr-core-course-column gdlr-core-column-10" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                                        </div>
                                                        <h5 style="text-align: center;">RECEIPT</h5>

                                                        <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                                            <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"></h5>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Date </label>
                                                                    @php $date = date_create($check->created_at); @endphp
                                                                    <p>{{ date_format($date,"jS F, Y") }}</p>
                                                                    <!-- <p>{{$check->created_at}}</p> -->

                                                                </div>
                                                            </div>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Payment Reference </label>
                                                                    <p>{{$check->reference_id}}</p>

                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Paid By </label>
                                                                    <p>{{$check->name}}</p> <br>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Phone Number </label>
                                                                    <p>{{$check->phone}}</p> <br>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Application Number</label>
                                                                    <p>{{$std->application_number}}</p> <br>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-full">
                                                                <table>
                                                                    <thead>
                                                                        <th style="text-align: center;">S/N</th>
                                                                        <th style="text-align: center;">Fee Name</th>
                                                                        <th style="text-align: center;">Amount</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Application Fee</td>
                                                                            <td>₦{{number_format($check->amount, 2)}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div>
                                                        <button type="button" class="btn btn-primary" id="print_receipt">Print Receipt</button>
                                                    </div>
                                                    <br>
                                                </div>


                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Basic Information (Some Fields Are Not Editable)</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">First Name</label>
                                                                    <input type="text" class="my_input" placeholder="First name" name="first_name" value="{{$std->first_name}}" required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Last Name</label>
                                                                    <input type="text" class="my_input" placeholder="Last name" name="last_name" value="{{$std->last_name}}" required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Title</label>
                                                                    <div class="gdlr-core-course-form-combobox">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="title" id="title" required>
                                                                            <option value="">Select title</option>
                                                                            <option value="Mr.">Mr.</option>
                                                                            <option value="Mrs.">Mrs</option>
                                                                            <option value="Ms.">Ms</option>
                                                                            <option value="Miss">Miss</option>
                                                                            <option value="Dr">Dr</option>
                                                                            <option value="Chief">Chief</option>
                                                                            <option value="Others">Others</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Email Address</label>
                                                                    <!-- <p>{{$std->email}}</p> -->
                                                                    <input type="email" class="my_input" name="email" value="{{$std->email}}" required readonly />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Phone Number</label>
                                                                    <input type="tel" class="my_input" name="phone" value="{{$std->phone}}" required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Application Number</label>
                                                                    <!-- <p>{{$std->application_number}}</p> -->
                                                                    <input type="text" class="my_input" name="phone_number" value="{{$std->application_number}}" readonly required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Gender</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="gender" required>
                                                                            <option value="">Select one</option>
                                                                            <option value="M">Male</option>
                                                                            <option value="F">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Marital Status</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="marital_status" required>
                                                                            <option value="">Select one</option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                            <option value="divorced">Divorced</option>
                                                                            <option value="widowed ">Widowed </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Applicant Date of Birth</label>
                                                                    <input type="date" class="my_input" placeholder="Date of Birth" name="dob" value="{{$std->dob}}" required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Country of Origin</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="country_of_origin" id="country_of_origin" required>
                                                                            <option value="">Select Country</option>
                                                                            @foreach($countries as $country)
                                                                            <option value="{{$country->name}}" data-id="{{$country->id}}">{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">State of Origin</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="state_of_origin" id="state_of_origin" required>
                                                                            <option value="">Select State</option>
                                                                            @foreach($states as $state)
                                                                            <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">LGA of Origin</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="lga_of_origin" id="lga_of_origin" required>
                                                                            <option value="">LGA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id" required>
                                                                    <label for="">Home Town</label>
                                                                    <input type="text" class="my_input" placeholder="" name="town_of_origin" value="{{$std->town_of_origin}}" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Country of Residence</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="country_of_residence" id="country_of_residence" required>
                                                                            <option value="">Select Country</option>
                                                                            @foreach($countries as $country)
                                                                            <option value="{{$country->name}}" data-id="{{$country->id}}">{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">State of Residence</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="state_of_residence" id="state_of_residence" required>
                                                                            <option value="">Select State</option>
                                                                            @foreach($states as $state)
                                                                            <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">LGA of Residence</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="lga_of_residence" id="lga_of_residence" required>
                                                                            <option value="">LGA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id" required>
                                                                    <label for="">Town of residence</label>
                                                                    <input type="text" class="my_input" placeholder="" name="town_of_residence" value="{{$std->town_of_residence}}" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id" required>
                                                                    <label for="">Residential Address</label>
                                                                    <input type="text" class="my_input" placeholder="" name="location_of_residence" value="{{$std->location_of_residence}}" />
                                                                </div>
                                                            </div>


                                                            <div class="gdlr-core-course-column gdlr-core-column-60">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="" class="gdlr-core-column-60">Do you have any Medical Condition? If yes, provide us more information.</label>
                                                                    <textarea maxlength="500" name="disability" style="background-color: #3b4b6b; color: #b1c0e0;" class="gdlr-core-column-30 input1 scholarship" cols="20" rows="10"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">PROGRAMME OF STUDY DETAILS </h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Faculty</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="faculty_id" id="faculty_id" required>
                                                                        <option value="">Select Faculty</option>
                                                                        @foreach($faculties as $faculty)
                                                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Department</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="dept_id" id="dept_id" required>
                                                                        <option value="">Select Department</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Programme</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="programme_id" id="programme_id" required>
                                                                        <option value="">Select Programme</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Specializations</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="specialization_id" id="specialization_id" required>
                                                                        <option value="">Select Specializations</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Qualification</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="qualification" id="qualification" required>
                                                                        <option value="">Select Qualification</option>
                                                                        <option value="M.Sc">M.Sc</option>
                                                                        <option value="M.Phil">M.Phil</option>
                                                                        <option value="Ph.D">Ph.D</option>
                                                                        <option value="PGD">PGD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">How do you wish to study?</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="study_type" id="study_type" required>
                                                                        <option value="">Select one</option>
                                                                        <option value="fulltime">Fulltime</option>
                                                                        <option value="part-time">Part-time</option>
                                                                        <option value="online">Online</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">FUNDING DETAILS </h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-40">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Please indicate how you intend to finance your studies</label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="funding" id="funding" required>
                                                                        <option value="">Select one</option>
                                                                        <option value="Parents">Parents</option>
                                                                        <option value="Self‐funded">Self‐funded</option>
                                                                        <option value="Scholarship">Scholarship</option>
                                                                        <option value="Company">Company</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Is this funding definite or proposed? </label>
                                                                <div class="gdlr-core-course-form-combobox">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="funding_type" id="funding_type" required>
                                                                        <option value="">Select one</option>
                                                                        <option value="Definite">Definite</option>
                                                                        <option value="Proposed">Proposed</option>
                                                                    </select>
                                                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#submit_form').click(function() {
        $('.gdlr-core-accordion-item-tab').addClass('gdlr-core-active')
    })

    $('#show_receipt').click(function() {
        $('#preview').slideToggle()
    })

    $('#faculty_id').change(function(){
        let faculty_id = $(this).find(":selected").val()
        $('#dept_id').find('option').remove().end().append('<option value="">Select department</option>').val('')
        ;
        $.post('/get_departments',{faculty_id}).done(function(response){
            response.body.map((item)=>{
                $('#dept_id').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

    $('#dept_id').change(function(){
        let dept_id = $(this).find(":selected").val()
        $('#programme_id').find('option').remove().end().append('<option value="">Select Programme</option>').val('')
        ;
        $.post('/get_programmes',{dept_id}).done(function(response){
            response.body.map((item)=>{
                $('#programme_id').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

    $('#programme_id').change(function(){
        let programme_id = $(this).find(":selected").val()
        $('#specialization_id').find('option').remove().end().append('<option value="">Select Specialization</option>').val('')
        ;
        $.post('/get_specializations',{programme_id}).done(function(response){
            response.body.map((item)=>{
                $('#specialization_id').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })



    $('#print_receipt').click(function() {

        // $(".element-to-print").printThis({importCSS: true,});
        var element = document.getElementById('preview_page');
        // console.log(element);
        var opt = {
            filename: 'Application_fee_receipt.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
        };
        html2pdf(element, opt)
    })

    $('#country_of_residence').change(function() {
        let country = $(this).find(":selected").val()
        if (country !== 'NIGERIA') {
            $('#state_of_residence').attr('disabled', true)
        } else {
            $('#state_of_residence').attr('disabled', false)
        }
    })

    $('#country_of_origin').change(function() {
        let country = $(this).find(":selected").val()
        if (country !== 'NIGERIA') {
            $('#state_of_origin').attr('disabled', true)
        } else {
            $('#state_of_origin').attr('disabled', false)
        }
    })

    $('#state_of_origin').change(function() {
        let state_id = $(this).find(":selected").data('id')
        $('#lga_of_origin')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('');
        $.post('/get_lgas', {
            state_id
        }).done(function(response) {
            response.body.map((item) => {
                $('#lga_of_origin').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })

    $('#state_of_residence').change(function() {
        let state_id = $(this).find(":selected").data('id')
        $('#lga_of_residence')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('');
        $.post('/get_lgas', {
            state_id
        }).done(function(response) {
            response.body.map((item) => {
                $('#lga_of_residence').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })
</script>

@endsection