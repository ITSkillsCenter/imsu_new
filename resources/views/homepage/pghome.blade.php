@extends('layouts.homepage_layout')
@section('content')
<style>
    #centralModal {
        display: block;
        top: 0%;
        position: absolute;
        margin: 0 auto;
        width: 100%;
        z-index: 190;
    }

    .hr {
        min-width: 100%;
        border-bottom: 1px solid black;
        margin-bottom: 3px;
    }

    #overlay {
        position: fixed;
        /* Sit on top of the page content */
        display: none;
        /* Hidden by default */
        width: 100%;
        /* Full width (cover the whole page) */
        height: 100%;
        /* Full height (cover the whole page) */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Black background with opacity */
        z-index: 2;
        /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer;
        /* Add a pointer on hover */
    }

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

    h1.heading {
        color: #fff;
        font-size: 1.15em;
        font-weight: 900;
        margin: 0 0 0.5em;
        color: #505050;
    }

    @media (max-width: 760px) {
        ul.navi {
            margin: 2px;
            padding: 5px;
        }
    }

    @media (min-width: 450px) {
        h1.heading {
            font-size: 3.55em;
        }

    }

    @media (min-width: 760px) {
        h1.heading {
            font-size: 3.05em;
        }
    }

    @media (min-width: 900px) {
        h1.heading {
            font-size: 3.25em;
            margin: 0 0 0.3em;
        }
    }

    .card-info:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-info:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .card-info-white {
        background-color: #fff;
        color: #777;
    }

    .card-info::after {
        content: "";
        display: inline-block;
        height: 100%;
        width: 100%;
        border-radius: 100px;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        transition: all .4s;
    }

    .card-info-white::after {
        background-color: #fff;
    }

    .card-info:hover::after {
        transform: scaleX(1.4) scaleY(1.6);
        opacity: 0;
    }

    .card-info-animated {
        animation: moveInBottom 5s ease-out;
        animation-fill-mode: backwards;
    }

    @keyframes moveInBottom {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }

    .rm {
        background-color: #192f59;
        border-radius: 10px;
        width: 45%;
        color: white !important;
        padding: 10px;
    }

    .rm:hover {
        background-color: #192f59 !important;
        color: white !important;
    }

    ul.navi {
        list-style: none;
        border: 1px solid #3db166;
        /* height: 300px; */
    }

    ul.navi li {
        padding: 10px;
        border-bottom: 1px solid #3db166;
        width: 100%;
    }

    .ttl {
        font-size: 18px;
        color: #4f6081;
        font-weight: 500;
    }

    .gr-s {
        padding: 10px;
        background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 1), rgba(61, 177, 102, 0.5));
    }

    .card{
        box-shadow: 0px 0px 12px 3px rgb(0 0 0 / 13%);

    }
</style>
@php
/*
@if(count($announcement) > 0)
<div class="mrq">
    <marquee>
        @foreach($announcement as $annc)
        <span><a class="mrq-body" style="color: white;" href="/article/{{$annc->id}}/{{str_slug($annc->heading, '-')}}">{{$annc->heading}}</a></span>
        @endforeach
    </marquee>
</div>
@endif
*/
@endphp
<div class="gdlr-core-page-builder-body">
    <div class="gdlr-core-pbf-wrapper" style="padding: 0px 0px 0px 0px;">
        <div class="gdlr-core-pbf-background-wrap" style="background-color: #192f59"></div>
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="
            gdlr-core-pbf-wrapper-container
            clearfix
            gdlr-core-pbf-wrapper-full-no-space
            ">
                <div class="gdlr-core-pbf-element">
                    <div class="
                  gdlr-core-revolution-slider-item
                  gdlr-core-item-pdlr
                  gdlr-core-item-pdb
                  " style="padding-bottom: 0px">
                        <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="
                     margin: 0px auto; 
                     background: transparent;
                     padding: 0px;
                     margin-top: 0px;
                     margin-bottom: 0px;
                     ">
                            <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display: none" data-version="5.4.8">
                                <ul>
                                    <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="homepage/upload/slider-1-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <img src="homepage/upload/slide_one1.jpg" alt="" title="slider-1-2" width="1800" height="1119" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                                        <div class="tp-caption tp-resizeme" id="slide-3-layer-1" data-x="38" data-y="center" data-voffset="-146" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="
                                 z-index: 5;
                                 white-space: nowrap;
                                 font-size: 27px;
                                 line-height: 27px;
                                 font-weight: 300;
                                 color: #8ef5a5;
                                 letter-spacing: 0px;
                                 font-family: Poppins;
                                 ">
                                            Discover the Passion and the Possibilities of
                                        </div>
                                        <div class="
                                 tp-caption
                                 tp-shape
                                 tp-shapewrapper
                                 tp-resizeme
                                 " id="slide-3-layer-4" data-x="33" data-y="center" data-voffset="-44" data-width="['740']" data-height="['100']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":330,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="
                                 z-index: 6;
                                 background-color: rgba(24, 36, 59, 0.9);
                                 border-radius: 3px 3px 3px 3px;
                                 margin: -30px 0 0 -60px;
                                 border-radius: 0 90px 90px 0 !important;
                                 "></div>
                                        <div class="tp-caption tp-resizeme" id="slide-3-layer-2" data-x="55" data-y="center" data-voffset="-52" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":360,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[10,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[20,0,0,0]" style="
                                 z-index: 7;
                                 white-space: nowrap;
                                 font-size: 43px;
                                 line-height: 83px;
                                 font-weight: 600;
                                 color: #ffffff;
                                 letter-spacing: 0px;
                                 font-family: Poppins;
                                 margin: -30px 0 0 -40px;
                                 border-radius: 0 90px 90px 0 !important;
                                 ">
                                            Imo State University, Owerri.
                                        </div>
                                        <div class="tp-caption rev-btn rev-hiddenicon" id="slide-3-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":660,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(1,61,135);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="
                                 z-index: 9;
                                 white-space: nowrap;
                                 font-size: 17px;
                                 line-height: 16px;
                                 font-weight: 600;
                                 color: #2d2d2d;
                                 letter-spacing: 0px;
                                 font-family: Poppins;
                                 background-color: rgb(255, 255, 255);
                                 border-color: rgb(61, 177, 102);
                                 border-style: solid;
                                 border-width: 0px 0px 0px 5px;
                                 outline: none;
                                 box-shadow: none;
                                 box-sizing: border-box;
                                 -moz-box-sizing: border-box;
                                 -webkit-box-sizing: border-box;
                                 cursor: pointer;
                                 margin: -50px 0 0 0px;
                                 ">
                                            Learn More
                                        </div>
                                    </li>
                                    <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="homepage/upload/slider-2-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <img src="homepage/upload/slide_two.jpg" alt="" title="slider-2" width="1800" height="1119" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                                        <div class="tp-caption tp-resizeme" id="slide-1-layer-1" data-x="36" data-y="center" data-voffset="-145" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="
                                 z-index: 5;
                                 white-space: nowrap;
                                 font-size: 27px;
                                 line-height: 27px;
                                 font-weight: 300;
                                 color: #8ef5a5;
                                 letter-spacing: 0px;
                                 font-family: Poppins;
                                 ">
                                            Discover the Passion and the Possibilities of
                                        </div>
                                        <div class="
                                 tp-caption
                                 tp-shape
                                 tp-shapewrapper
                                 tp-resizeme
                                 " id="slide-3-layer-4" data-x="33" data-y="center" data-voffset="-44" data-width="['740']" data-height="['100']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":330,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="
                                 z-index: 6;
                                 background-color: rgba(24, 36, 59, 0.9);
                                 border-radius: 3px 3px 3px 3px;
                                 margin: -30px 0 0 -60px;
                                 border-radius: 0 90px 90px 0 !important;
                                 "></div>
                                        <div class="tp-caption tp-resizeme" id="slide-1-layer-2" data-x="33" data-y="center" data-voffset="-41" data-width="['740']" data-height="['90']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":370,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[40,0,0,0]" style="
                                 z-index: 6;
                                 white-space: nowrap;
                                 font-size: 43px;
                                 line-height: 83px;
                                 font-weight: 600;
                                 color: #ffffff;
                                 letter-spacing: 0px;
                                 font-family: Poppins;
                                 margin: -30px 0 0 -40px;
                                 border-radius: 0 90px 90px 0 !important;
                                 ">
                                            Imo State University, Owerri.
                                        </div>
                                        <div class="tp-caption rev-btn rev-hiddenicon" id="slide-1-layer-6" data-x="34" data-y="center" data-voffset="80" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":740,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,64,132);bg:rgba(255,255,255,1);bw:0 0 0 5px;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[19,19,19,19]" data-paddingright="[21,21,21,21]" data-paddingbottom="[19,19,19,19]" data-paddingleft="[21,21,21,21]" style="
                                 z-index: 7;
                                 white-space: nowrap;
                                 font-size: 17px;
                                 line-height: 16px;
                                 font-weight: 600;
                                 color: #2d2d2d;
                                 letter-spacing: 0px;
                                 font-family: Poppins;
                                 background-color: rgb(255, 255, 255);
                                 border-color: rgb(61, 177, 102);
                                 border-style: solid;
                                 border-width: 0px 0px 0px 5px;
                                 outline: none;
                                 box-shadow: none;
                                 box-sizing: border-box;
                                 -moz-box-sizing: border-box;
                                 -webkit-box-sizing: border-box;
                                 cursor: pointer;
                                 margin: -50px 0 0 0px;
                                 ">
                                            Learn More
                                        </div>
                                    </li>
                                </ul>
                                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="gdlr-core-pbf-wrapper " style="padding: 60px 0px 60px 0px;">
        <div class="gdlr-core-pbf-background-wrap"></div>
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container" style="max-width: 900px;">
                <div class="gdlr-core-pbf-element" style="box-shadow: 0px 0px 20px 5px rgb(25 47 88 / 44%); background: #50545c0e;">
                    <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-left-align gdlr-core-tab-style1-horizontal">
                        <div class="gdlr-core-tab-item-wrap">
                            <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">

                            </div>
                            <div class="gdlr-core-tab-item-content-wrap clearfix">
                                <div class="gdlr-core-tab-item-content gdlr-core-active text-center">
                                    <div style="padding-bottom: 10px;" class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-title-item-caption-top">
                                        <div class="gdlr-core-title-item-title-wrap ">
                                            <h3 class="gdlr-core-title-item-title" style="font-size: 22px; text-align:center; font-weight: 700 ;text-transform: none ;color: #314e85 ;">
                                                <br>
                                                Admissions Is In Progress!
                                                <span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                    <div>
                                        Admissions into the Imo State University Post Graduate Studies for 2021/2022 academic session is in progress
                                        <br><br> <a href='' class='btn btn-primary btn-xs rm'>Read More</a> <br><br>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="gr-s">
        <div class="row">
            <div class="col-md-3">
                <div class="left menu">
                    <ul class="navi">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Online studies</a></li>
                        <li><a href="#">Work-study Programme</a></li>
                        <li><a href="#">Scholarship and financial aid</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <img src="homepage/images/girl.jpg" style="border: 4px solid green;" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="col-md-6" style="padding:10px 20px">
                <p class="ttl">Welcome to</p>
                <h4 style="color: #3db166;">Imo State University Post Graduate Studies</h4>
                <p>
                    It is with great pleasure that I welcome you to Imo State University (IMSU).
                    IMSU was established in 1981 through law No. 4 passed by the Imo State House of Assembly.
                    Established with the vision of pursuing the advancement of learning and academic excellence,
                    the university has been unrelenting in the pursuit of its mission of becoming a citadel of learning,
                    a community with the trademark of excellence in teaching, research and service to humanity, a catalyst as well as an agent for development.
                </p>
            </div>
        </div>
    </section>

    <section style="background-color:#f7fcf9; width: 100%; margin:auto; padding-top:5%;">
        
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-6">
                                    <img src="homepage/images/girl.jpg" class="img-fluid" alt="...">
                                </div>
                                
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="col-md-6">
                                    <img src="homepage/images/girl.jpg" class="img-fluid" alt="...">
                                </div>
                                
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="col-md-6">
                                    <img src="homepage/images/girl.jpg" class="img-fluid" alt="...">
                                </div>
                                
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6"></div>
        </div>

        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p style="color: rgba(61, 177, 102, 0.76); font-family: Poppins;
                font-style: normal;
                font-weight: normal;
                font-size: 25px;">Subscribe to Newsletter</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="content">
                            <div class="input-group">
                                <input style="border:none; border-bottom: 1px solid #2E4579; border-top: 1px solid #2E4579; border-left: 1px solid #2E4579;" type="email" class="form-control" placeholder="Enter your email">
                                <span class="input-group-btn">
                                    <button class="btn" type="submit">Subscribe Now</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </section>


    </section>
</div>
</div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script>
    $(document).ready(function() {
        //   $('#centralModal').css('display', 'block');
        //   $('#overlay').css('display', 'block');
    });

    $('#closeit').click(function() {
        $('#centralModal').css('display', 'none');
        $('#overlay').css('display', 'none');
    });
</script>


<style>
    .my-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 0px;

        position: static;
        width: auto;
        height: auto;

        background: rgba(255, 255, 255, 0.5);

        /* Inside Auto Layout */

        flex: none;
        order: 0;
        flex-grow: 0;
        margin: 22px 0px;
    }

    .hr {
        position: static;
        width: auto;
        height: 0.5px;
        left: 0px;
        top: 159px;

        background: #6D9279;
    }

    .card-date {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 10px 15px;

        position: static;
        width: 184px;
        height: 38px;
        left: 0px;
        top: 0px;

        background: #35486D;
        color: white;
        /* Inside Auto Layout */

        flex: none;
        order: 0;
        flex-grow: 0;
        /* margin: 8px 0px; */
    }

    .card-title {


        font-family: Poppins;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 132%;
        /* or 18px */
        padding: 13px;

        align-items: center;

        color: #3DB166;
    }

    .card-text {

        font-family: Poppins;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 152.5%;
        color: #35486D;
        padding: 13px;
    }

    .btn--outline--success {

        padding: 15px 20px;
        font-size: 16px;

        /* position: absolute; */
        width: auto;
        /* height: 46px; */


        background: transparent;
        border: 3.5px solid #3DB166;
        box-sizing: border-box;
        border-radius: 10px;
    }


    /* Newsletter btn */
    .newsletter {
        padding: 80px 0;
        background: transparent;
    }

    .newsletter .content {
        max-width: 650px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .newsletter .content h2 {
        color: #243c4f;
        margin-bottom: 40px;
    }

    .newsletter .content .form-control {
        height: 50px;
        border-color: #ffffff;
        border-radius: 0;
    }

    .newsletter .content.form-control:focus {
        box-shadow: none;
        border: 2px solid #2E4579;
    }

    .newsletter .content .btn {
        min-height: 50px;
        border-radius: 0;
        background: #2E4579;
        color: #fff;
        font-weight: 600;
    }
</style>
@endsection