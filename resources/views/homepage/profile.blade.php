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
                                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Note: Candidate's basic information cannot be changed</span>
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
                                                                    <label for="">Jamb Registration Number </label>
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
                                                                    <label for="">Full Name</label>
                                                                    <!-- <p>{{$std->full_name}}</p> -->
                                                                    <input type="text" class="my_input" placeholder="Full name" name="full_name" value="{{$std->full_name}}" required/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Email Address</label>
                                                                    <p>{{$std->email}}</p>
                                                                    <!-- <input type="text" class="my_input" placeholder="" name="email_address" value="{{$std->email}}"/> -->
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Phone Number</label>
                                                                    <!-- <p>{{$std->phone_number}}</p> -->
                                                                    <input type="tel" class="my_input" name="phone_number" value="{{$std->phone_number}}" required/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Jamb Registration Number</label>
                                                                    <p>{{Session::get('jamb_reg')}}</p>
                                                                    <!-- <input type="text" class="my_input" placeholder="Jamb reg" name="jamb_reg" value="{{Session::get('jamb_reg')}}" hidden /> -->
                                                                </div>
                                                            </div>



                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">UTME Score</label>
                                                                    <!-- <p>{{$std->jamb_score}}</p> -->
                                                                    <input type="text" class="my_input" placeholder="UTME score" name="jamb_score" value="{{$std->jamb_score}}" required/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Program Applied for</label>
                                                                    <div class="gdlr-core-course-form-combobox">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="course" id="course" required>
                                                                            <option value="">Select program</option>
                                                                            @foreach($departments as $department)
                                                                            <option value="{{$department->name}}">{{$department->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-full">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">UTME Subject and Score</label>
                                                                    <!-- <p>
                                                                        {{$std->jamb_subject1}} ({{$std->score1}}), {{$std->jamb_subject2}} ({{$std->score2}}),
                                                                        {{$std->jamb_subject3}} ({{$std->score3}}), {{$std->jamb_subject4}} ({{$std->score4}})
                                                                    </p> -->
                                                                </div>
                                                            </div>
                                                            @for($i = 1; $i<=4; $i++)
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Subject {{$i}}</label>
                                                                    <div class="gdlr-core-course-form-combobox">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="jamb_subject{{$i}}" required>
                                                                            <option value="">Select Subject</option>
                                                                            @foreach($subjects as $subject)
                                                                            <option value="{{$subject}}">{{$subject}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-10">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Score {{$i}}</label>
                                                                    <input type="text" class="my_input" placeholder="0" name="score{{$i}}" value="" />
                                                                </div>
                                                            </div>
                                                            @endfor

                                                            

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">State of Origin</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="state" id="state_of_origin" required>
                                                                            <option value="">Select State</option>
                                                                            @foreach($states as $state)
                                                                            <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- <input type="text" class="my_input" placeholder="state" name="state" value="{{$std->state}}" /> -->
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">LGA</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="lga" id="lga" required>
                                                                            <option value="">LGA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Home Town</label>
                                                                    <input type="text" class="my_input" placeholder="" name="home_town" value="{{$std->home_town}}" />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Gender</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="sex" required>
                                                                            <option value="">Select one</option>
                                                                            <option value="M">Male</option>
                                                                            <option value="F">Female</option>
                                                                        </select>
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
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Additional Information </h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Email Address (Alternative)</label>
                                                                <input type="email" class="my_input" placeholder="Email Address (Alternative)" name="email_alt" value="{{$std->email_alt}}" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Phone Number (Alternative)</label>
                                                                <input type="tel" class="my_input" placeholder="Phone no. (Alternative)" name="phone_number_alt" value="{{$std->phone_number_alt}}" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Next of Kin</label>
                                                                <input type="text" class="my_input" placeholder="Next of kin" name="next_of_kin" value="{{$std->next_of_kin}}" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Next of Kin Phone Number</label>
                                                                <input type="tel" class="my_input" placeholder="Next of kin phone number" name="next_of_kin_phone" value="{{$std->next_of_kin_phone}}" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Address</label>
                                                                <input type="text" class="my_input" placeholder="Address" name="address" value="{{$std->address}}" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Applicant Date of Birth</label>
                                                                <input type="date" class="my_input" placeholder="Date of Birth" name="date_of_birth" value="{{$std->date_of_birth}}" required />
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

    $('#print_receipt').click(function() {

        // $(".element-to-print").printThis({importCSS: true,});
        var element = document.getElementById('preview_page');
        // console.log(element);
        var opt = {
            filename:     'Application_fee_receipt.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
        };
        html2pdf(element, opt)
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
</script>

@endsection