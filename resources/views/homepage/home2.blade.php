@extends('layouts.homepage_layout2')
@section('content')
<style>
    #overlay {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 2;
      cursor: pointer;
   }
</style>

<main id="main">

    <!--================ Responsive Home Banner Area =================-->
    <section id="section-id-1623988361603" class="sppb-section">
        <div class="sppb-container-inner">
            <div class="sppb-row sppb-no-gutter">
                <div class="sppb-col-md-12" id="column-wrap-id-1623988361602">
                    <div id="column-id-1623988361602" class="sppb-column">
                        <div class="sppb-column-addons">
                            <div id="sppb-addon-wrapper-1623988361606" class="sppb-addon-wrapper">
                                <div id="sppb-addon-1623988361606" class="clearfix ">
                                    <div class="tz-slideshow-wrapper">
                                        <div class="tz-slideshow" uk-slideshow="minHeight: 500; maxHeight: 630; autoplay: 1; pauseOnHover: false; autoplayInterval: 5000; animation: scale">
                                            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                                                <ul class="uk-slideshow-items js-fullheight">
                                                    <!-- 1st ITem -->
                                                    <li class="el-item item-0 js-fullheight">
                                                        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-left" style="-webkit-animation-duration: 5s; animation-duration: 5s;">
                                                            <img style="filter: brightness(80%);" class="ui-image" src="/assets/img/banner/banner_1-min.JPG" alt="Imo State University, Owerri" uk-cover>
                                                        </div>
                                                        <div class="uk-position-cover" style="background: -webkit-linear-gradient(45deg, rgba(13, 71, 161, 0.81) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;background: linear-gradient(45deg, rgba(13, 71, 161, 0.81) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;">
                                                        </div>
                                                        <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-container-large ">
                                                            <div class="uk-panel uk-width-2xlarge uk-light uk-margin-remove-first-child slider_text">
                                                                <p data-animation="animated fadeInLeft" style="color: #c1dcec; font-weight: 600 !important; font-family: 'Poppins', sans-serif;">
                                                                    Discover the Passion and the Possibilities of
                                                                </p>
                                                                <h3 class="ui-title uk-margin-remove-bottom uk-heading-medium uk-margin-top" style="font-family: 'Playfair Display', sans-serif; font-weight: 700;">Imo State University <br> Owerri, Nigeria.</h3>

                                                                <div class="uk-margin-large-top"><a class="uk-button  uk-button-large uk-button-rounded default-btn" href="#" uk-scroll>Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- 2nd Item -->
                                                    <li class="el-item item-1 js-fullheight">
                                                        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-left" style="-webkit-animation-duration: 5s; animation-duration: 5s;">
                                                            <img style="filter: brightness(80%);" class="ui-image" src="/assets/img/banner/banner_2-min.JPG" alt="Imo State University" uk-cover>
                                                        </div>
                                                        <div class="uk-position-cover" style="background: -webkit-linear-gradient(45deg, rgba(13, 71, 161, 0.71) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;background: linear-gradient(45deg, rgba(13, 71, 161, 0.71) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;">
                                                        </div>
                                                        <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-container-large">
                                                            <div class="uk-panel uk-width-2xlarge uk-light uk-margin-remove-first-child slider_text">
                                                                <h3 class="ui-title uk-margin-remove-bottom uk-heading-medium uk-margin-top" style="font-family: 'Playfair Display', sans-serif; font-weight: 700;">Imo State University, Owerri.</h3>
                                                                <p data-animation="animated fadeInLeft" style="color: #c1dcec; font-weight: 600 !important; font-family: 'Poppins', sans-serif;">
                                                                    A dedicated community of responsible thinkers and doers.
                                                                </p>
                                                                <div class="uk-margin-large-top"><a class="uk-button  uk-button-large uk-button-rounded default-btn" href="#" uk-scroll>Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- 3rd Item -->
                                                    <li class="el-item item-2 js-fullheight">
                                                        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-left" style="-webkit-animation-duration: 5s; animation-duration: 5s;">
                                                            <img style="filter: brightness(80%);" class="ui-image" src="/assets/img/banner/banner3-min.JPG" alt="Imo State University" uk-cover>
                                                        </div>
                                                        <div class="uk-position-cover" style="background: -webkit-linear-gradient(45deg, rgba(13, 71, 161, 0.71) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;background: linear-gradient(45deg, rgba(13, 71, 161, 0.71) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;">
                                                        </div>
                                                        <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-container-large">
                                                            <div class="uk-panel uk-width-2xlarge uk-light uk-margin-remove-first-child slider_text">
                                                                <h3 class="ui-title uk-margin-remove-bottom uk-heading-medium uk-margin-top" style="font-family: 'Playfair Display', sans-serif; font-weight: 700;">Imo State University, Owerri.</h3>
                                                                <p data-animation="animated fadeInRight" style="color: #c1dcec; font-weight: 600 !important; font-family: 'Poppins', sans-serif;">
                                                                    Located in the heart of the cosmoplitan city of Owerri, Imo State - the Eastern Heartland.
                                                                </p>
                                                                <div class="uk-margin-large-top"><a class="uk-button  uk-button-large uk-button-rounded default-btn" href="#" uk-scroll>Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="el-item item-2 js-fullheight">
                                                        <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-left" style="-webkit-animation-duration: 5s; animation-duration: 5s;">
                                                            <img style="filter: brightness(80%);" class="ui-image" src="/assets/img/banner/banner4-min.jpg" alt="Imo State University" uk-cover>
                                                        </div>
                                                        <div class="uk-position-cover" style="background: -webkit-linear-gradient(45deg, rgba(13, 71, 161, 0.71) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;background: linear-gradient(45deg, rgba(13, 71, 161, 0.71) 0%, rgba(15, 26, 44, 0.6) 43%) transparent;">
                                                        </div>
                                                        <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle uk-container uk-container-large">
                                                            <div class="uk-panel uk-width-2xlarge uk-light uk-margin-remove-first-child slider_text">
                                                                <h3 class="ui-title uk-margin-remove-bottom uk-heading-medium uk-margin-top" style="font-family: 'Playfair Display', sans-serif; font-weight: 700;">Imo State University, Owerri.</h3>
                                                                <p data-animation="animated fadeInRight" style="color: #c1dcec; font-weight: 600 !important; font-family: 'Poppins', sans-serif;">
                                                                Imo state university, Owerri, Nigeria ...an innovation ecosystem dedicated to producing problem solvers.
                                                                </p>
                                                                <div class="uk-margin-large-top"><a class="uk-button  uk-button-large uk-button-rounded default-btn" href="#" uk-scroll>Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="uk-hidden-hover uk-hidden-touch uk-visible@m uk-light">
                                                    <a class="ui-slidenav  uk-position-medium uk-slidenav-large uk-position-center-left" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                                                    <a class="ui-slidenav  uk-position-medium uk-slidenav-large uk-position-center-right" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Responsive Banner Area -->


    <!-- ================ Information Area ==================== -->
    <section class="imprt-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 px-lg-0 link-hover">
                    <div class="imprt-info-content text-center">
                        <a href="">

                            <div class="icon-box mb-3">
                                <img src="/assets/img/icons/icon-3.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-details">
                                <h6>Continuing <br> Education</h6>
                            </div>

                        </a>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 px-lg-0 link-hover">

                    <div class="imprt-info-content text-center imprt-styled imprt-1st-styled">
                        <a href=>
                            <div class="icon-box mb-3">
                                <img src="/assets/img/icons/icon-1.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-details">
                                <h6>Undergraduate <br> Studies</h6>
                            </div>
                        </a>
                        <!-- <div class="card-img-overlay position-absolute overly"></div> -->
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 px-lg-0 link-hover">

                    <div class="imprt-info-content text-center imprt-styled">
                        <a href="">
                            <div class="icon-box mb-3">
                                <img src="/assets/img/icons/icon-2.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-details">
                                <h6>Postgraduate <br> Studies</h6>
                            </div>
                        </a>

                    </div>

                </div>


                <div class="col-lg-3 col-md-6 px-lg-0 link-hover">
                    <div class="imprt-info-content text-center">
                        <a href="">
                            <div class="icon-box mb-3">
                                <img src="/assets/img/icons/icons8-computer.png" alt="icon" class="img-fluid">
                            </div>
                            <div class="info-details">
                                <h6>Open and <br>Distance Learning</h6>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Information Area -->

    <!-- =================== Welcome Area ================== -->
    <section class="wlc-area section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="wlc-img ">
                        <div class="card-img position-relative">
                            <img src="/assets/img/vcpic1.jpg" alt="Vice-Chancellor" class="img-fluid position-relative">
                            <div class="card-img-overlay">
                                <h4>Prof. Peter Achunike Akah</h4>
                                <p>Ag. Vice Chancellor</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="wlc-content ml-">
                        <span>Welcome to</span>
                        <h2>Imo State University</h2>
                        <p>It is with great pleasure that I welcome you to Imo State University (IMSU). <br>
                            IMSU was established in 1981 through law No. 4 passed by the Imo State House of Assembly. Established with the vision of pursuing the advancement of learning and academic excellence, the university has been unrelenting in the pursuit of its mission of becoming a citadel of learning, a community with the trademark of excellence in teaching, research and service to humanity, a catalyst as well as an agent for development..</p>
                        <a href="#" class="default-btn">
                            Find out more
                            <i class="icofont-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End WElcome Area -->

    <!-- =================== Discover Area ========= -->
    <section class="study-area section">
        <div class="container">
            <div class="section-title white-title pb-3 mb-xl-4">
                <h2>Discover IMSU</h2>
                <p class="mt-xl-3">
                    An innovative ecosystem dedicated to producing problem solvers.
                </p>
            </div>
            <div class="row justify-content-center ">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-study card h-100">
                        <!-- <i class="flaticon-graduated"></i> -->
                        <div class="card-img">
                            <img src="/assets/img/imsu/post_grad-3.jpg" alt="" class="img-fluid">
                        </div>
                        <h3>
                            <a href="">Scholarship & Financial Aid</a>
                        </h3>
                        <p class="pt-0 mt-0">
                            Imo State University offers limited need and merit based scholarship and financial aids ...
                        </p>
                        <a href="" class="read-more">
                            Find out more
                            <span class="icofont-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-study card h-100">
                        <!-- <i class="flaticon-book"></i> -->
                        <div class="card-img">
                            <img src="/assets/img/imsu/campus.jpeg" alt="" class="img-fluid">
                        </div>
                        <h3>
                            <a href="">Campus Life</a>
                        </h3>
                        <p class="pt-0 mt-0">
                            IMSU Campus Life is the official Imo State University, Owerri welfare and entertainment unit ...
                        </p>
                        <a href="" class="read-more">
                            Find out more
                            <span class="icofont-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-study card h-100">
                        <!-- <i class="flaticon-computer-science"></i> -->
                        <div class="card-img">
                            <img src="/assets/img/imsu/innovation.jpg" alt="" class="img-fluid">
                        </div>
                        <h3>
                            <a href="">Research and Innovation</a>
                        </h3>
                        <p class="pt-0 mt-0">
                            Through research and innovation, IMSU aims to become one of the most world-class ...
                        </p>
                        <a href="" class="read-more">
                            Find out more
                            <span class="icofont-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single-study card h-100">
                        <!-- <i class="flaticon-teacher"></i> -->
                        <div class="card-img">
                            <img src="/assets/img/upload/alumni.jpeg" alt="" class="img-fluid">
                        </div>
                        <h3>
                            <a href="">IMSU Alumni</a>
                        </h3>
                        <p class="pt-0 mt-0">
                            Request for your transcript. Login to view shipment progress. Receive update ...
                        </p>
                        <a href="" class="read-more">
                            Find out more
                            <span class="icofont-arrow-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Discover Area -->

    <!-- ================== UPdates =================== -->
    <section class="section updates">
        <div class="container">
            <div class="row">
                <!-- Faculties -->
                <div class="col-lg-4 col-md-12">
                    <div class="faculs">
                        <div class="title section-title">
                            <h2>Our Faculties</h2>
                        </div>
                        <ul class="list-unstyled">
                            @foreach($faculties as $faculty)
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="/faculty/{{$faculty->slug}}">{{$faculty->name}}</a> </li>
                            @endforeach
                            <!-- <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Basic Clinical</a> </li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Basic Medical Sciences</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Biological Sciences</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Business Administration (Management Sciences)</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Clinical Medicine</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Education</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Engineering</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Environmental Sciences</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Health Sciences</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Humanities</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Law</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Physical Sciences</a></li>
                            <li><span class="bx bxs-right-down-arrow-circle"></span><a href="">Faculty of Social Sciences</a></li> -->
                        </ul>
                    </div>
                </div>

                <!-- News and Updates -->
                <div class="col-lg-8 col-md-12">
                    <div class="news_updates">
                        <div class="title section-title">
                            <h2>Latest News and Updates</h2>
                        </div>
                        <!-- Single News -->
                        @foreach ( $articles as $article )
                        <div class="single-news">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- <div class="news-img"> /assets/img/banner/post-banner.jpg -->
                                    @php
                                    if($article->image !== null){
                                    $img = '/uploads/images/articles/'.$article->image;
                                    }else{
                                    $img = '/assets/img/banner/post-banner.jpg';
                                    }
                                    @endphp
                                    <img src="{{$img}}" alt="" class="img-fluid h-100 w-100 news-img">
                                    <!-- </div> -->
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="news-content ">
                                        <div class="date mb-2 ">
                                            <div><i class="icofont-calendar">&nbsp; </i> {{date("F j, Y", strtotime($article->published_at))}}</div>
                                            <div class="news-cat">{{$article->category->name}}</div>
                                        </div>
                                        <h3 class="headlne"><a href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">{{ucfirst($article->heading)}} </a> </h3>
                                        <p class="pb-0 mb-0 news-details">
                                            {!!trimString($article->content, 150)!!}...
                                            <a href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}" class="rm_">Continue reading</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="d-flex justify-content-end align-content-end">
                            <a href="/article" class="default-btn mt-4 float-right">
                                View All
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End UPdates -->

    <!-- ============== Events Area =================-->
    
    <section class="events-area events-area-style-two py-4">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5">
                    <div class="imsu-recent_event">
                        @if($event_latest !== null)
                        <div class="title">
                            <h2 class="text-white text-underline">:: Recent Event</h2>
                        </div>

                        @php
                        if($event_latest->image !== null){
                        $img = '/uploads/images/articles/'.$event_latest->image;
                        }else{
                        $img = '/homepage/images/Rectangle49.png';
                        }
                        @endphp
                        <div class="event-img">
                            <img src="{{$img}}" alt="Image" class="img-fluid w-100" />
                        </div>
                        <div class="recent_event">
                            <h2>{{$event_latest->heading}}</h2>
                            <p>{!! trimString($article->content, 250) !!}...</p>
                            <a href="/article/{{$event_latest->id}}/{{str_slug($event_latest->heading, '-')}}" class="default-btn mt-3">
                                Click here to know more
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="events-content">
                        <!-- <span>Events</span> -->
                        <h2>Upcoming events</h2>
                        @if(count($events) > 0)

                        <ul class="events-list">
                            @foreach($events as $event)
                            <li class="single-news">
                                <div class="events-date">
                                    <span class="mb-2">{{date("M j", strtotime($event->start_date))}}</span>
                                    <span>{{date("Y", strtotime($event->start_date))}}</span>
                                </div> <br>
                                <!-- <span>{{$event->category->name}}</span> -->
                                <h3>
                                    <a href="/article/{{$event->id}}/{{str_slug($event->heading, '-')}}">
                                        {{$event->heading}}
                                    </a>
                                </h3>
                                <!-- <p class="pt-0 mt-0">
                                    {{trimString($event->content, 250)}}...
                                </p> -->
                                <p class="pt-0 m-0">
                                    Venue: Imo State University
                                </p>
                                <p class="pt-0 mt-0">
                                    Time: {{$event->time ?? '8am - 4pm'}}
                                </p>
                                <a href="/article/{{$event->id}}/{{str_slug($event->heading, '-')}}" class="read-more fnd-rm">
                                    Read more
                                    <i class="icofont-arrow-right"></i>
                                </a>
                                <br><br>
                            </li>
                            @endforeach
                            <li style="text-align: right;">
                                <a href="/article" class="default-btn2 mt-3">
                                    Click here to know more
                                    <i class="icofont-arrow-right"></i>
                                </a>
                            </li>
                            
                        </ul>
                        @else
                        <h6>No upcoming events</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- End Events Area -->

    <!-- ================== Download & Newsletter =======================  -->
    <!-- <section class="dwnd section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="dwnloads">
                        <div class="title section-title text-center">
                            <h2>Downloads</h2>
                        </div>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <a href="/docs/IMSU_ACADEMIC_CALENDAR.docx" target="_self" download>
                                    <span class="icofont-ui-file icon"></span>
                                    <span>2020/2021 Academic Calendar</span>
                                </a>
                            </li>
                            <li>
                                <a href="/docs/IMSU_Faculties_and_Departments.docx" target="_self" download>
                                    <span class="icofont-ui-file icon"></span>
                                    <span>List of Faculties and Deparments</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icofont-ui-file icon"></span>
                                    <span>Student Handbook</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icofont-ui-file icon"></span>
                                    <span>IMSU Anthem</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icofont-ui-file icon"></span>
                                    <span>2020/2021 Supplemetary Admission List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="newsletter d-flex justify-content-center align-items-center text-center" style="background:white;">
                        <div class="newsletter-content" style="padding: 0 20px;">
                            <div class="icon-box">
                                <img src="/assets/img/icons/icon-envelope.png" alt="" class="img-fluid">
                            </div>
                            <div class="newsletter-info mt-5">
                                <h4>Subscribe To Newsletter</h4>
                                <p class="subtitle pb-4">Get Updates to News & Events</p>
                                <p>Subscribe to our newsletter to stay updated on our upcoming events, news and campus activities.</p>
                            </div>
                            <form action="#" class="newsletter-form mt-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Your Email Address">
                                </div>
                                <button class="btn w-100 default-btn mt-4">
                                    Subscribe
                                    <i class="icofont-location-arrow"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

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
    <!-- End Download &.. -->
        <br><br>
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

        <div class="container">
            <div class="section-title title">
                <h2>Gallery</h2>
                <p>Some photos from Our School</p>
            </div>
        </div>

        <div class="container-fluid px-0 mx-0">

            <div class="row no-gutters px-0 mx-0">
                <div class="owl-carousel gallery-carousel mt-4 px-0">
                    <!-- Item 1 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-1-min.JPG" class="venobox card-img" data-gall="gallery-item" data-title="A handshake with the President - Mohammadu Buhari">
                                <img src="/assets/img/gallery/gallery-1-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-2-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-2-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-3-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-3-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-4-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-4-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 5 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-5-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-5-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 6 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-6-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-6-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 7 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-7-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-7-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 8 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-8-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-8-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 9 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-9-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-9-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 10 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-10-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-10-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 11 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-11-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-11-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 12 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-12-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-12-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 13 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-13-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-13-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 14 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-14-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-14-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <!-- Item 15 -->
                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-15-min.JPG" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-15-min.JPG" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="">
                        <div class="gallery-item position-relative">
                            <a href="/assets/img/gallery/gallery-16-min.jpg" class="venobox card-img" data-gall="gallery-item">
                                <img src="/assets/img/gallery/gallery-16-min.jpg" alt="" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Gallery Section -->


</main>
<div class="" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; top: 8%; width:100%; z-index:1000; position: fixed; margin: 0 auto;">
    <div class="modal-dialog modal-lg" style="border: 0;" role="document">
        <div class="modal-content" style="border: 0;">
            <div class="modal-header text-white" style="display:flex; justify-content:space-between; background: linear-gradient(90deg,rgb(17, 182, 122) 0%, rgb(0, 148, 68) 100%);">
                <p style="font-weight:bold; color:white">News Update!</p>
                <button type="button" id="closeit" class="close" data-dismiss="modal" style="opacity: 1; color:white" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <a href="/post-graduate">
                        <img src="homepage/upload/spgs_admission_popup2.jpg" class="img-responsive" alt="">
                    </a>
                    <!-- <p>Registration of students on the portal has commenced Click here to register
                  </p> -->
                    <br>
                    <div class="row mx-auto">
                        <a class="col-md-6" href="https://imsu.edu.ng/article/31/imo-state-university-school-of-post-graduate-studies-admission"><span class="btn btn-brimary" style="background-color: green; color:white; border:none;">Read More</span></a>
                        <a class="col-md-6" href="/admission-application#pg"><span class="btn btn-primary" style="background-color: green; color:white; border:none;">Apply now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="overlay"></div>

<script>
    $(document).ready(function() {
        $('#centralModal').css('display', 'block');
        $('#overlay').css('display', 'block');
    });

    $('#closeit').click(function() {
        $('#centralModal').css('display', 'none');
        $('#overlay').css('display', 'none');
    });
</script>

@endsection