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

    .crd {
        box-shadow: 0px 0px 12px 3px rgb(0 0 0 / 13%);

    }

    .widget {
        color: #4e4e4e;
        padding: 0.5vw 1vw;
    }

    .widget.link {
        background-color: #ffffff;
        border: none;
        width: fit-content;
    }

    .widget.link a {
        padding: 7px 14px;
        color: #3db166;
        width: fit-content;
        background-color: #ffffff;
        border-radius: 3px;
        border: 3px #3db166 solid;
        transition: color 0.2s linear, background 0.2s linear, border-color 0.2s linear, text-shadow 0.2s linear;
    }

    .right.programmes .widget .faculties {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #ffffff;
        margin-bottom: 1vw;
        transition: color 0.2s linear, background 0.2s linear, border-color 0.2s linear, text-shadow 0.2s linear;
        color: #3db166;
    }

    .right.programmes div.widget div:hover {
        color: #ffffff;
        background-color: #192F59;
    }

    .right.programmes .widget .faculties a {
        color: #192F59;
        padding: 10px 14px;
        font-size: 13px;
        font-weight: 600;
        width: 100%;
        text-decoration: none;
        display: inline-flex;
        justify-content: space-between;
        transition: color 0.2s linear, background 0.2s linear, border-color 0.2s linear, text-shadow 0.2s linear;
    }

    .right.programmes .widget .faculties a:hover {
        color: #ffffff;
    }

    .clsss {
        padding: 7px 14px;
        background-color: #3db166;
        border-radius: 3px;
        width: 100%;
        color: white !important;
        text-align: center;
    }

    .clsss a {
        color: white !important;
    }

    .inner {
        padding: 20px 30px;
    }

    .maincontainer {
        background-image: radial-gradient(rgba(255, 255, 255, 0.4), rgba(0, 0, 0, 0.4)),url(homepage/images/bg.jpg);
        padding: 5vw 1vw;
        background-position: center bottom;
        background-size: cover;
    }

    .inner .row .left.call .widget h1 {
        color: #ffffff;
        font-size: 25px;
        background-color: #192f59;
        padding: 1vw 3vw 1vw 1vw;
        border-top-right-radius: 10000px;
        border-bottom-right-radius: 10000px;
    }

    .right.enquire {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 2vw;
        margin-top: 20px;
    }

    .right.enquire h5 {
        color: #192f59;
        padding-bottom: 1vw;
        border-bottom: 2px
        #192f59 solid;
    }

    .right.enquire .widget.link222 {
        padding: 1vw 0vw;
        text-align: center;
        background-color: #192f59;
        border-radius: 5px;
        width: 95%;
    }

    .widget.link222 a{
        color: white !important;
    }

    .widget.link10 a {
        padding: 14px 14px;
        background-color: #ffffff;
        color: #2d2d2d;
        text-decoration: none;
        font-weight: 700;
        border-left: 5px #3db166 solid;
    }
    
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="maincontainer">
        <div class="inner">
            <div class="row">
                <div class="col-md-12 col-lg-8 left call">
                    <div class="widget">
                        <br><br><br>
                        <h4 style="color: #3db166;">Move Foward !</h4>
                    </div>
                    <div class="widget">
                        <h1>Imo State University Post Graduate Studies</h1>
                    </div>
                    <div class="widget link10">
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4  right enquire">
                    <div class="widget underline">
                        <h5>Enquire For Post Graduate</h5>
                    </div>
                    <div class="widget">
                        <p><strong>Email:</strong> info@imsu.edu.ng</p>
                    </div>
                    <div class="widget">
                        <p><strong>Phone:</strong> +234 816 550 2620</p>
                    </div>
                    <div class="widget">
                        <p><strong>Address:</strong> PMB 2000, Owerri, Imo State, Nigeria</p>
                    </div>
                    <div class="widget space"></div>
                    <div class="widget link222">
                        <a href="#">Enquire Now</a>
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

    <section class="gdlr-core-pbf-wrapper " style="padding: 60px 30px; background: #50545c0e">

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="widget">
                        <h4 style="color: #3db166;">Post Graduate News & Updates</h4>
                    </div>
                    <div class="col-md-12 crd" style="padding: 0; margin-bottom: 30px">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12" style="padding: 0;">
                                    <img src="homepage/images/Rectangle.png" style="width: 100%;" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-12 card-text">
                                    <div class="text">
                                        <div class="widget date">
                                            <p><i class="fas fa-calendar-alt" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; 27th September 2021</p>
                                        </div>
                                        <div class="widget">
                                            <p class="ttl">
                                                Admissions Into The Imo State University Post Graduate Studies
                                            </p>
                                        </div>
                                        <div class="widget">
                                            <p>
                                                The management of the Imo State University wishes to announce the on-going post graduate studies admissions for 2021/2022.....
                                            </p>
                                        </div>
                                        <div class="widget link">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 crd" style="padding: 0; margin-bottom: 30px">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12" style="padding: 0;">
                                    <img src="homepage/images/Rectangle.png" style="width: 100%;" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-12 card-text">
                                    <div class="text">
                                        <div class="widget date">
                                            <p><i class="fas fa-calendar-alt" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; 27th September 2021</p>
                                        </div>
                                        <div class="widget">
                                            <p class="ttl">
                                                Admissions Into The Imo State University Post Graduate Studies
                                            </p>
                                        </div>
                                        <div class="widget">
                                            <p>
                                                The management of the Imo State University wishes to announce the on-going post graduate studies admissions for 2021/2022.....
                                            </p>
                                        </div>
                                        <div class="widget link">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 crd" style="padding: 0; margin-bottom: 30px">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12" style="padding: 0;">
                                    <img src="homepage/images/Rectangle.png" style="width: 100%;" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-12 card-text">
                                    <div class="text">
                                        <div class="widget date">
                                            <p><i class="fas fa-calendar-alt" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; 27th September 2021</p>
                                        </div>
                                        <div class="widget">
                                            <p class="ttl">
                                                Admissions Into The Imo State University Post Graduate Studies
                                            </p>
                                        </div>
                                        <div class="widget">
                                            <p>
                                                The management of the Imo State University wishes to announce the on-going post graduate studies admissions for 2021/2022.....
                                            </p>
                                        </div>
                                        <div class="widget link">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="clsss">
                            <a href="#">View More</a>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-md-8">
                <div class="right programmes">
                    <div class="widget">
                        <h4 style="color: #192F59;">Our Programmes and Courses</h4>
                    </div>
                    <div class="widget">
                        <div class="faculties">
                            <a href="#">Faculty of Physical Sciences <i class="fas fa-chevron-down" aria-hidden="true"></i></a>
                           
                        </div>
                        <div class="faculties"><a href="#">Faculty of Biological Sciences <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Health Sciences <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Law <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Engineering <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Education <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Humanities <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Social Sciences <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Enviromental Sciences <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Basic Medical Sciences <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Basic Clinical <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Agricultural Science &amp; Veterinary <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Business Administration (Management Sciences) <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                        <div class="faculties"><a href="#">Faculty of Clinical Medicine <i class="fas fa-chevron-down" aria-hidden="true"></i></a></div>
                    </div>
                </div>

                
            </div>
        </div>




    </section>
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p style="color: #192f59;font-size: 25px;">Subscribe to Newsletter</p>
                </div>
                <div class="col-sm-12">
                    <div class="content">
                        <div class="input-group">
                            <input style="border:none; border-bottom: 2px solid #2E4579; border-top: 1px solid #2E4579; border-left: 2px solid #2E4579; border-radius:5px" type="email" class="form-control" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button class="btn" type="submit">Subscribe Now</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>




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

    var acc = document.getElementsByClassName("faculties");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
    }
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