@extends('layouts.homepage_layout')
@section('content')
<style>
    #vn-click {
        padding: 10px 15px;
        background: #FD6CA3;
        color: #fff;
        cursor: pointer;
        display: inline-block
    }

    #vn-info {
        display: none;
        background: #fff;
        color: #000;
        padding: 30px 20px
    }

    label {
        color: black
    }
</style>
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">

                <div class="panel">
                    <div class="panel-body">
                        <div class="gdlr-core-pbf-element">
                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                <div class="gdlr-core-title-item-title-wrap clearfix">
                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">Invoice Generated Successfully</h3>
                                <!-- </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">An email containing your receipt has been sent to you</span> -->
                                <!-- <p style="color:red; font-style:italic">An email containing your receipt has been sent to you</p> -->
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" id="print_receipt2">Print Invoice</button>
                            </div>
                            <br>
                            <div id="preview">
                                <div class="gdlr-core-course-form clearfix element-to-print" id="preview_page" style="padding: 10px; border: 1px solid black;">
                                    <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:center">
                                        <img class="gdlr-core-course-column gdlr-core-column-10" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                    </div>
                                    <h5 style="text-align: center;">INVOICE</h5>

                                    <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                        <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"></h5>
                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="" style="color:black">Date </label>
                                                @php $date = date_create($check->created_at); @endphp
                                                <p>{{ date_format($date,"jS F, Y") }}</p>
                                                <!-- <p>{{$check->created_at}}</p> -->

                                            </div>
                                        </div>
                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Payment Reference </label>
                                                <p>{{$id}}</p>

                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Invoice To</label>
                                                <p>{{$student->first_name}}</p> <br>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Phone Number </label>
                                                <p>{{$student->Student_Mobile_Number}}</p> <br>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Matric Number </label>
                                                <p>{{$student->registration_number !== null? $student->registration_number : $student->matric_number }}</p> <br>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                <label for="">Email </label>
                                                <p>{{$student->Email_Address}}</p> <br>
                                            </div>
                                        </div>

                                        

                                        <div class="gdlr-core-course-column gdlr-core-column-full">
                                            <table>
                                                <thead>
                                                    <th style="text-align: center;">S/N</th>
                                                    <th style="text-align: center;">Fee Name</th>
                                                    <th style="text-align: center;">Amount</th>
                                                    <th style="text-align: center;">Status</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$fee->fee_name}}</td>
                                                        <td>₦{{number_format($check->amount, 2)}}</td>
                                                        <td>UNPAID</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                                <br>
                                <div>
                                    <button type="button" class="btn btn-primary" id="print_receipt">Print Invoice</button>
                                </div>
                                <br>
                            </div>
                        </div>



                    </div>

                </div>


            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            .payment_btn {
                width: 100%;
                margin-bottom: 10px !important;
            }
        }
    </style>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#print_receipt').click(function() {

        // $(".element-to-print").printThis({importCSS: true,});
        var element = document.getElementById('preview_page');
        // console.log(element);
        var opt = {
            filename: 'Invoice.pdf',
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

    $('#print_receipt2').click(function() {

        // $(".element-to-print").printThis({importCSS: true,});
        var element = document.getElementById('preview_page');
        // console.log(element);
        var opt = {
            filename: 'Invoice.pdf',
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
</script>

@endsection