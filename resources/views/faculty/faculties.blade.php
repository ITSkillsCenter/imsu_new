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
    /* 
        .card-info {
            box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.75);
    -webkit-box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.75);
        }
        .card-info:hover {
            box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        } */


    /* 
    .card-info {
    display: block; 
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
        transition: box-shadow .25s; 
    }
    .card-info:hover {
    box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    transition: all .25s ease;
    } */

    h1.heading {
        color: #fff;
        font-size: 1.15em;
        font-weight: 900;
        margin: 0 0 0.5em;
        color: #505050;
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
</style>

<div class="kingster-body-outer-wrapper ">
    <div class="kingster-body-wrapper clearfix  kingster-with-frame">
        


        <div class="kingster-page-title-wrap  kingster-style-custom kingster-left-align" style="background-image: url('/faculty_images/{{$faculty->image}}');">
            <div class="kingster-header-transparent-substitute"></div>
            <div class="kingster-page-title-overlay"></div>
            <div class="kingster-page-title-bottom-gradient"></div>
            <div class="kingster-page-title-container kingster-container">
                <div class="kingster-page-title-content kingster-item-pdlr" style="padding-top: 400px ;padding-bottom: 60px ;">
                    <div class="kingster-page-caption" style="font-size: 21px ;font-weight: 400 ;letter-spacing: 0px ;">Undergraduate Program</div>
                    <h1 class="kingster-page-title" style="font-size: 48px ;font-weight: 700 ;text-transform: none ;letter-spacing: 0px ;color: #ffffff ;">{{$faculty->name}}</h1>
                </div>
            </div>
        </div>
        <div class="kingster-breadcrumbs">
            <div class="kingster-breadcrumbs-container kingster-container">
                <div class="kingster-breadcrumbs-item kingster-item-pdlr"> <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Kingster." href="index.html" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span>&gt;<span property="itemListElement" typeof="ListItem"><span property="name">{{$faculty->name}}</span>
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
        </div>
        <div class="kingster-page-wrapper" id="kingster-page-wrapper">
            <div class="gdlr-core-page-builder-body">
                <div class="gdlr-core-pbf-sidebar-wrapper " style="margin: 0px 0px 30px 0px;">
                    <div class="gdlr-core-pbf-sidebar-container gdlr-core-line-height-0 clearfix gdlr-core-js gdlr-core-container">
                        <div class="gdlr-core-pbf-sidebar-content  gdlr-core-column-40 gdlr-core-pbf-sidebar-padding gdlr-core-line-height gdlr-core-column-extend-left" style="padding: 35px 0px 20px 0px;">
                            <div class="gdlr-core-pbf-sidebar-content-inner">
                                <!-- <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
                                            <div class="gdlr-core-title-item-title-wrap clearfix">
                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 27px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">Outstanding Academics essential business experience</h3>
                                            </div>
                                        </div>
                                    </div> -->
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                        <div class="gdlr-core-text-box-item-content" style="font-size: 16px ;text-transform: none ;">
                                            <p>{{$faculty->about}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px ;">
                                        <div class="gdlr-core-title-item-title-wrap clearfix">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #223d71 ;margin-right: 30px ;">Departments</h3>
                                            <div class="gdlr-core-title-item-divider gdlr-core-right gdlr-core-skin-divider" style="font-size: 22px ;border-bottom-width: 3px ;"></div>
                                        </div>
                                    </div>
                                </div>
                                @foreach($departments as $department)
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px -7px 0px 0px;">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                    <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                        <div class="gdlr-core-feature-box-background" style="background-image: url(homepage/upload/slide_one1.jpg) ;opacity: 0.14 ;"></div>
                                                        <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                                                            <h3 class="gdlr-core-feature-box-item-title" style="font-size: 16px ;font-weight: 600 ;">{{$department->name}}</h3>
                                                        </div>
                                                        <a class="gdlr-core-feature-box-link" href="accounting/index.html" target="_self"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px -3px 0px -3px;">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                            <div class="gdlr-core-feature-box-background" style="background-image: url(upload/major-bg-2.jpg) ;opacity: 0.14 ;"></div>
                                                            <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                                                                <h3 class="gdlr-core-feature-box-item-title" style="font-size: 16px ;font-weight: 600 ;">Finance</h3></div>
                                                            <a class="gdlr-core-feature-box-link" href="finance/index.html" target="_self"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 0px -7px;padding: 0px 0px 45px 0px;">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                            <div class="gdlr-core-feature-box-background" style="background-image: url(upload/support-image-3.jpg) ;opacity: 0.14 ;"></div>
                                                            <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                                                                <h3 class="gdlr-core-feature-box-item-title" style="font-size: 16px ;font-weight: 600 ;">Marketing</h3></div>
                                                            <a class="gdlr-core-feature-box-link" href="#" target="_self"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 15px ;">
                                            <div class="gdlr-core-text-box-item-content" style="font-size: 21px ;text-transform: none ;color: #3db166 ;">
                                                <p>If you&#8217;re an educational professional who are looking to progress into management and consultancy, or an educational planning or development role, this is the best degree for you.</p>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-color: #3db166 ;border-bottom-width: 3px ;"></div>
                                        </div>
                                    </div> -->

                            </div>
                        </div>
                        <div class="gdlr-core-pbf-sidebar-right gdlr-core-column-extend-right  kingster-sidebar-area gdlr-core-column-20 gdlr-core-pbf-sidebar-padding  gdlr-core-line-height" style="padding: 35px 0px 30px 0px;">
                            <div class="gdlr-core-sidebar-item gdlr-core-item-pdlr">
                                <div id="text-18" class="widget widget_text kingster-widget">
                                    <div class="textwidget">
                                        <div class="gdlr-core-widget-box-shortcode " style="color: #ffffff ;padding: 30px 45px;background-color: #192f59 ;">
                                            <div class="gdlr-core-widget-box-shortcode-content">
                                                </p>
                                                <h3 style="font-size: 20px; color: #fff; margin-bottom: 25px;">Faculty Contact Info</h3>
                                                <p><span style="color: #3db166; font-size: 16px; font-weight: 600;">{{$faculty->name}}</span>
                                                    <!-- <br /> <span style="font-size: 15px;"><br /> 1810 Campus Way NE<br /> Bothell, WA 98011-8246</span> -->
                                                </p>
                                                <p><span style="font-size: 15px;">{{$faculty->phone_number}}<br /> {{$faculty->email}}<br /> </span></p>
                                                <!-- <p><span style="font-size: 16px; color: #3db166;">Mon &#8211; Fri 9:00A.M. &#8211; 5:00P.M.</span></p> <span class="gdlr-core-space-shortcode" style="margin-top: 40px ;"></span> -->
                                                <!-- <h3 style="font-size: 20px; color: #fff; margin-bottom: 15px;">Social Info</h3>
                                                    <div class="gdlr-core-social-network-item gdlr-core-item-pdb  gdlr-core-none-align" style="padding-bottom: 0px ;"><a href="#url" target="_blank" class="gdlr-core-social-network-icon" title="facebook" style="color: #3db166 ;"><i class="fa fa-facebook" ></i></a><a href="#" target="_blank" class="gdlr-core-social-network-icon" title="google-plus" style="color: #3db166 ;"><i class="fa fa-google-plus" ></i></a><a href="#" target="_blank" class="gdlr-core-social-network-icon" title="linkedin" style="color: #3db166 ;"><i class="fa fa-linkedin" ></i></a><a href="#" target="_blank" class="gdlr-core-social-network-icon" title="skype" style="color: #3db166 ;"><i class="fa fa-skype" ></i></a><a href="#url" target="_blank" class="gdlr-core-social-network-icon" title="twitter" style="color: #3db166 ;"><i class="fa fa-twitter" ></i></a><a href="#" target="_blank" class="gdlr-core-social-network-icon" title="instagram" style="color: #3db166 ;"><i class="fa fa-instagram" ></i></a></div>  --><span class="gdlr-core-space-shortcode" style="margin-top: 40px ;"></span> <a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-gradient gdlr-core-button-no-border" href="#" style="padding: 16px 27px 18px;margin-right: 20px;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;"><span class="gdlr-core-content">Student Resources</span></a>
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-pbf-wrapper " style="padding: 90px 0px 60px 0px;">
                    <div class="gdlr-core-pbf-background-wrap" style="background-color: #efefef ;"></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-element">
                                <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                                    <!-- <div class="gdlr-core-tab-item-content-image-wrap clearfix">
                                        <div class="gdlr-core-tab-item-image  gdlr-core-active" data-tab-id="1">
                                            <div class="gdlr-core-lightgallery gdlr-core-js ">
                                                <span class="gdlr-core-tab-item-image-background" style="background-image: url('/faculty_images/{{$faculty->image}}');">
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="gdlr-core-tab-item-image " data-tab-id="4">
                                            <div class="gdlr-core-lightgallery gdlr-core-js ">
                                                <span class="gdlr-core-tab-item-image-background" style="background-image: url('/faculty_images/{{$faculty->image}}');">
                                                </span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="gdlr-core-tab-item-wrap">
                                        <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                                            <div class="gdlr-core-tab-item-title  gdlr-core-active" data-tab-id="1">Benefits</div>
                                            <!-- <div class="gdlr-core-tab-item-title " data-tab-id="2">Self Development</div>
                                                <div class="gdlr-core-tab-item-title " data-tab-id="3">Spirituality</div> -->
                                            <div class="gdlr-core-tab-item-title " data-tab-id="4">Alumni</div>
                                        </div>
                                        <div class="gdlr-core-tab-item-content-wrap clearfix">
                                            <div class="gdlr-core-tab-item-content  gdlr-core-active" data-tab-id="1" style="background-color: #ffffff ;background-image: url('homepage/upload/slide_one1.jpg') ;background-position: top right ;">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                    <div class="gdlr-core-title-item-title-wrap ">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;text-transform: none ;color: #314e85 ;">Why Choose this faculty?<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                    </div>
                                                </div>
                                                <p>{{$faculty->benefit}}</p>
                                            </div>
                                            <!-- <div class="gdlr-core-tab-item-content " data-tab-id="2" style="background-color: #ffffff ;background-image: url(upload/tab-bg.png) ;background-position: top right ;">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                        <div class="gdlr-core-title-item-title-wrap ">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;text-transform: none ;color: #314e85 ;">Self Development<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                                    </div>
                                                    <p>The Kingster University Alumni Association is excited to announce the arrival of KU Alumni Connect. This is a new community building platform for Kinster’s alumni. It is the only place online where you can find, and connect with, all 90,000 Kingster’s alumni. All alumni are automatically enrolled!</p>
                                                    <p>Kingster University was established by John Smith in 1920 for the public benefit and it is recognized globally. Throughout our great history, Kingster has offered access to a wide range of academic opportunities. As a world leader in higher education, the University has pioneered change in the sector.</p>
                                                </div> -->
                                            <!-- <div class="gdlr-core-tab-item-content " data-tab-id="3" style="background-color: #ffffff ;background-image: url(upload/tab-bg.png) ;background-position: top right ;">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                        <div class="gdlr-core-title-item-title-wrap ">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;text-transform: none ;color: #314e85 ;">Spirituality<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                                    </div>
                                                    <p>The Kingster University Alumni Association is excited to announce the arrival of KU Alumni Connect. This is a new community building platform for Kinster’s alumni. It is the only place online where you can find, and connect with, all 90,000 Kingster’s alumni. All alumni are automatically enrolled!</p>
                                                    <p>Kingster University was established by John Smith in 1920 for the public benefit and it is recognized globally. Throughout our great history, Kingster has offered access to a wide range of academic opportunities. As a world leader in higher education, the University has pioneered change in the sector.</p>
                                                </div> -->
                                            <div class="gdlr-core-tab-item-content " data-tab-id="4" style="background-color: #ffffff ;background-image: url('homepage/upload/slide_one1.jpg') ;background-position: top right ;">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                    <div class="gdlr-core-title-item-title-wrap ">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;text-transform: none ;color: #314e85 ;">Alumni<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                    </div>
                                                </div>
                                                <p>{{$faculty->alumni}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-pbf-wrapper " style="padding: 95px 0px 45px 0px;">
                    <div class="gdlr-core-pbf-background-wrap"></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-element">
                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                    <div class="gdlr-core-title-item-title-wrap clearfix">
                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 27px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">Why Study Here?</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-column gdlr-core-column-40 gdlr-core-column-first">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 5px ;">
                                                <div class="gdlr-core-text-box-item-content" style="text-transform: none ;">
                                                    <p>{{$faculty->why_study_here}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                                    <div class="gdlr-core-text-box-item-content" style="text-transform: none ;">
                                                        <p>Not only does Kingster University provide you the practical skills that is necessary to transition seamlessly into the workforce upon your graduation, but we also make sure that you will have a good sense of social justice so that you make the transition responsibly.</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-pbf-wrapper " style="padding: 65px 0px 60px 0px;">
                    <div class="gdlr-core-pbf-background-wrap" style="background-color: #192f59 ;"></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 45px 0px 0px 0px;">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 20px ;">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 23px ;text-transform: none ;color: #ffffff ;">
                                                    <p>The PLP in Drafting Legislation, Regulation, and Policy has been offered by the Institute of Advanced Legal Studies with considerable success since 2004.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="#" style="font-size: 14px ;font-weight: 700 ;letter-spacing: 0px ;padding: 13px 26px 16px 30px;text-transform: none ;margin: 0px 10px 10px 0px;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;background: #3db166 ;"><span class="gdlr-core-content">Apply</span><i class="gdlr-core-pos-right fa fa-external-link" style="font-size: 14px ;"></i></a><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="#" style="font-size: 14px ;font-weight: 700 ;letter-spacing: 0px ;padding: 13px 26px 16px 30px;text-transform: none ;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;background: #3db166 ;"><span class="gdlr-core-content">Download Brochure</span><i class="gdlr-core-pos-right fa fa-file-pdf-o" style="font-size: 14px ;"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="gdlr-core-pbf-column gdlr-core-column-30" id="gdlr-core-column-1">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: -123px 0px 0px 0px;padding: 0px 0px 0px 40px;">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-image-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-center-align">
                                                    <div class="gdlr-core-image-item-wrap gdlr-core-media-image  gdlr-core-image-item-style-rectangle" style="border-width: 0px;"><img src="upload/shutterstock_183400235-400x257.jpg" width="700" height="450"  alt="" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


@endsection