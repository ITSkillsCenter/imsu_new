<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>IMSU</title>

    <link rel="shortcut icon" href="{{URL::asset('homepage/favicon.jpg')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::asset('homepage/favicon.jpg')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ URL::asset('homepage/css/bootstrap.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('homepage/plugins/goodlayers-core/plugins/combine/style.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('homepage/plugins/goodlayers-core/include/css/page-builder.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('homepage/plugins/revslider/public/assets/css/settings.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('homepage/css/style-core.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('homepage/css/kingster-style-custom.css')}}" type="text/css" media="all" />
    <script type="text/javascript" src="{{ URL::asset('homepage/js/jquery/jquery.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3" type="text/css" media="all" />

    @yield('style')
</head>

<body class="
      home
      page-template-default page page-id-2039
      gdlr-core-body
      woocommerce-no-js
      tribe-no-js
      kingster-body
      kingster-body-front
      kingster-full
      kingster-with-sticky-navigation
      kingster-blockquote-style-1
      gdlr-core-link-to-lightbox
    ">
    <div class="kingster-mobile-header-wrap">
        <div class="
          kingster-mobile-header
          kingster-header-background
          kingster-style-slide
          kingster-sticky-mobile-navigation
        " id="kingster-mobile-header">
            <div class="kingster-mobile-header-container kingster-container clearfix">
                <div class="kingster-logo kingster-item-pdlr">
                    <div class="kingster-logo-inner">
                        <a class="" href="/"><img src="{{ URL::asset('homepage/images/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="kingster-mobile-menu-right">
                    <div class="kingster-main-menu-search" id="kingster-mobile-top-search">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="kingster-top-search-wrap">
                        <div class="kingster-top-search-close"></div>
                        <div class="kingster-top-search-row">
                            <div class="kingster-top-search-cell">
                                <form role="search" method="get" class="search-form" action="#">
                                    <input type="text" class="search-field kingster-title-font" placeholder="Search..." value="" name="s" />
                                    <div class="kingster-top-search-submit">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <input type="submit" class="search-submit" value="Search" />
                                    <div class="kingster-top-search-close">
                                        <i class="icon_close"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="kingster-mobile-menu">
                        <a class="
                  kingster-mm-menu-button
                  kingster-mobile-menu-button
                  kingster-mobile-button-hamburger
                " href="#kingster-mobile-menu"><span></span></a>
                        <div class="kingster-mm-menu-wrap kingster-navigation-font" id="kingster-mobile-menu" data-slide="right">
                            <ul id="menu-main-navigation" class="m-menu">
                                <li class="
                      menu-item menu-item-home
                      current-menu-item
                      menu-item-has-children
                    ">
                                    <a href="/">Home</a>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a href="#">The University</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            <a href="#">About Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Vice Chancellor</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">DVC Admin</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">DVC Academic/a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Registrar</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="https://webmail.imsu.edu.ng">Webmail</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a href="bachelor-of-science-in-business-administration.html">Academics</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item menu-item-has-children">
                                            <a>Faculties</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="bachelor-of-science-in-business-administration.html">Business Administration</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">School Of Law</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Engineering</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Medicine</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Art &#038; Science</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children">
                                            <a href="#">Faculties</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="#">Hospitality Management</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Physics</a>
                                                </li>
                                                <li class="menu-item"><a href="#">Chemistry</a></li>
                                                <li class="menu-item"><a href="#">Music</a></li>
                                                <li class="menu-item">
                                                    <a href="#">Computer Science</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="/admission-portal">Admissions</a>
                                    <!-- <ul class="sub-menu">
                                        <li class="menu-item">
                                            <a href="/admission-portal">Post UTME/DE</a>
                                        </li>

                                        <li class="menu-item">
                                            <a href="/student-portal-registration">Returning Students Registration</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/student-portal-registration">Validate Acceptance Fee</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="/student-portal-registration">Pay Acceptance Fee</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Distance & Online Learning</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">continuous Education</a>
                                        </li>
                                    </ul> -->
                                </li>
                                <li class="menu-item">
                                    <a href="https://oer.imsu.edu.ng">E-Library</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">E-Learning</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://oer.imsu.edu.ng">OER</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Centers</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://webmail.imsu.edu.ng">Webmail</a>
                                </li>
                                <li class="menu-item">
                                    <a href="/admission-instruction">Admission Application</a>
                                </li>
                                <li class="menu-item">
                                    <a href="/portal">Portal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kingster-body-outer-wrapper">
        <div class="kingster-body-wrapper clearfix kingster-with-frame">
            <div class="kingster-top-bar">
                <div class="kingster-top-bar-background"></div>
                <div class="kingster-top-bar-container kingster-container">
                    <div class="kingster-top-bar-container-inner clearfix">
                        <div class="kingster-top-bar-left kingster-item-pdlr">
                            <i class="fa fa-envelope-open-o" id="i_fd84_0"></i>
                            info@imsu.edu.ng<i class="fa fa-phone" id="i_fd84_1"></i>

                        </div>
                        <div class="kingster-top-bar-right kingster-item-pdlr">
                            <ul id="kingster-top-bar-menu" class="
                    sf-menu
                    kingster-top-bar-menu kingster-top-bar-right-menu
                  ">
                                <!-- <li class="menu-item kingster-normal-menu">
                                    <a href="/student-portal">Student Registration</a>
                                </li> -->
                                <li class="menu-item kingster-normal-menu">
                                    <a href="#">TETFUND</a>
                                </li>
                                <li class="menu-item kingster-normal-menu">
                                    <a href="#">Giving / Donation</a>
                                </li>
                                <li class="menu-item kingster-normal-menu">
                                    <a href="/scholarship">Scholarship</a>
                                </li>

                                <li class="menu-item kingster-normal-menu">
                                    <a href="https://webmail.imsu.edu.ng">Webmail</a>
                                </li>
                                <!-- <li class="menu-item kingster-normal-menu">
                                    <a href="/admission-instruction">Admission Application</a>
                                </li> -->
                                <li class="menu-item kingster-normal-menu">
                                    <a href="{{route('contacts')}}">Contacts</a>
                                </li>

                                <li class="menu-item kingster-normal-menu">
                                    <a class="kingster-top-bar-right-button" href="/portal">Portal</a>
                                </li>
                            </ul>
                            <div class="kingster-top-bar-right-social"></div>

                        </div>
                    </div>
                </div>
            </div>
            <header class="
            kingster-header-wrap
            kingster-header-style-plain
            kingster-style-menu-right kingster-sticky-navigation kingster-style-fixed" data-navigation-offset="75px">
                <div class="kingster-header-background"></div>
                <div class="kingster-header-container kingster-container">
                    <div class="kingster-header-container-inner clearfix">
                        <div class="kingster-logo kingster-item-pdlr">
                            <div class="kingster-logo-inner">
                                <a class="" href="/"><img src="{{ URL::asset('homepage/images/logo.png')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="kingster-navigation kingster-item-pdlr clearfix">
                            <div class="kingster-main-menu" id="kingster-main-menu">
                                <ul id="menu-main-navigation-1" class="sf-menu">
                                    <li class="
                        menu-item menu-item-home
                        current-menu-item
                        kingster-normal-menu
                      ">
                                        <a href="/" class="sf-with-ul-pre">Home</a>
                                    </li>

                                    <li class="
                        menu-item menu-item-has-children
                        kingster-mega-menu
                      ">
                                        <a href="bachelor-of-science-in-business-administration.html" class="sf-with-ul-pre">The University</a>
                                        <div class="sf-mega sf-mega-full megaimg">
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children" data-size="15">
                                                    <a class="sf-with-ul-pre">Imo State University</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="#">Vision, Mission & Objectives</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Imsu Anthem</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Our History</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children" data-size="15">
                                                    <a href="#" class="sf-with-ul-pre">Administration</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="#">Vice Chancellor</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">DVC Admin</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">DVC Academics</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Registrar</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="menu-item" data-size="20">
                                                    <div class="kingster-mega-menu-section-content">
                                                        <h4>About Us</h4>
                                                        <span id="span_fd84_0">The Imo State University (IMSU) was established
                                                            in 1981 through law No. 4 passed by the Imo
                                                            State House of Assembly. Established with the
                                                            vision of pursuing the advancement of learning
                                                            and academic excellence, the university has been
                                                            unrelenting in the pursuit of its mission of
                                                            becoming a citadel of learning, a community with
                                                            the trademark of excellence in teaching,
                                                            research and service to humanity, a catalyst as
                                                            well as an agent for development.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="
                                        menu-item menu-item-has-children
                                        kingster-mega-menu">
                                        <a href="bachelor-of-science-in-business-administration.html" class="sf-with-ul-pre">Academic</a>
                                        <div class="sf-mega sf-mega-full megaimg">
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children" data-size="15">
                                                    <a class="sf-with-ul-pre">Faculties</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="bachelor-of-science-in-business-administration.html">Law</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Engineering</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Agriculture & Veterinary Medicine</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Science</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Social Science</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children" data-size="15">
                                                    <a href="#" class="sf-with-ul-pre">Faculties</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="#">Education</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Management Science</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Humanities</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Health Science</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Medicine</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="/post-graduate">School of Postgraduate</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="#">Environmental Science</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item" data-size="20">
                                                    <a href="#" class="sf-with-ul-pre">Student</a>
                                                    <div class="kingster-mega-menu-section-content">
                                                        <ul class="sub-menu">
                                                            <li class="menu-item">
                                                                <a href="#">Portal</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="#">Pay Acceptance</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="#">Course Registration</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="#">Student's ID Card</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="#">Apply For Transcript</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="#">2020 JUPEB Result</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="#">Admissions Forms</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="/faq">Frequently asked questions</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <!-- <li class="
                                        menu-item menu-item-has-children
                                        kingster-normal-menu">
                                        <a href="#" class="sf-with-ul-pre">Admission</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60">
                                                <a href="/admission-portal">Post UTME/DE</a>
                                            </li>
                                            <li class="menu-item" data-size="60">
                                                <a href="#">Post Graduate Studies</a>
                                            </li>
                                            <li class="menu-item" data-size="60">
                                                <a href="#">Pre-Degree Studies</a>
                                            </li>
                                            <li class="menu-item" data-size="60">
                                                <a href="#">Distance & Online Learning</a>
                                            </li>
                                            <li class="menu-item" data-size="60">
                                                <a href="#">Continuing Education</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="menu-item kingster-normal-menu">
                                        <a href="/admission-portal">Admissions</a>
                                    </li>
                                    <li class="menu-item kingster-normal-menu">
                                        <a href="https://oer.imsu.edu.ng">E-Library</a>
                                    </li>
                                    <li class="menu-item kingster-normal-menu">
                                        <a href="#">E-Learning</a>
                                    </li>
                                    <li class="menu-item kingster-normal-menu">
                                        <a href="https://oer.imsu.edu.ng">OER</a>
                                    </li>
                                    <li class="menu-item kingster-normal-menu">
                                        <a href="#">Centers</a>
                                    </li>
                                    <!-- <li class="menu-item">
                                        <a href="https://webmail.imsu.edu.ng/portal">Webmail</a>
                                    </li> -->
                                </ul>
                                <div class="kingster-navigation-slide-bar" id="kingster-navigation-slide-bar"></div>
                            </div>
                            <div class="kingster-main-menu-right-wrap clearfix">
                                <div class="kingster-main-menu-search" id="kingster-top-search">
                                    <i class="icon_search"></i>
                                </div>
                                <div class="kingster-top-search-wrap">
                                    <div class="kingster-top-search-close"></div>
                                    <div class="kingster-top-search-row">
                                        <div class="kingster-top-search-cell">
                                            <form role="search" method="get" class="search-form" action="#">
                                                <input type="text" class="search-field kingster-title-font" placeholder="Search..." value="" name="s" />
                                                <div class="kingster-top-search-submit">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                                <input type="submit" class="search-submit" value="Search" />
                                                <div class="kingster-top-search-close">
                                                    <i class="icon_close"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="kingster-page-wrapper" id="kingster-page-wrapper">
                @yield('content')
            </div>
            <footer>
                <div class="kingster-footer-wrapper">
                    <div class="kingster-footer-container kingster-container clearfix">
                        <div class="
                  kingster-footer-column kingster-item-pdlr kingster-column-15
                ">
                            <div id="text-2" class="widget widget_text kingster-widget">
                                <div class="textwidget">
                                    <p>
                                        <img src="{{ URL::asset('homepage/images/logo.png')}}" alt="" style="background: white; padding: 10px" />
                                        <br />
                                        <span class="gdlr-core-space-shortcode" id="span_1dd7_10"></span>
                                        <br />
                                        Our primarily goals focuses on continuous provision of
                                        quality learning environment and producing highly
                                        intellectual graduates with reputable character
                                    </p>
                                    <p>
                                        <span class="gdlr-core-space-shortcode" id="span_1dd7_12"></span>
                                        <br />
                                        <a id="a_1dd7_8" href="#">
                                            info@imsu.edu.ng</a>
                                    </p>
                                    <div class="
                        gdlr-core-divider-item
                        gdlr-core-divider-item-normal
                        gdlr-core-left-align
                      ">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider" id="div_1dd7_111"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="
                  kingster-footer-column kingster-item-pdlr kingster-column-15
                ">
                            <div id="gdlr-core-custom-menu-widget-2" class="
                    widget widget_gdlr-core-custom-menu-widget
                    kingster-widget
                  ">
                                <h3 class="kingster-widget-title">Our Campus</h3>
                                <span class="clear"></span>
                                <div class="menu-our-campus-container">
                                    <ul id="menu-our-campus" class="
                        gdlr-core-custom-menu-widget gdlr-core-menu-style-plain
                      ">
                                        <li class="menu-item"><a href="{{route('contacts')}}">Contacts</a></li>
                                        <li class="menu-item"><a href="#">About Us</a></li>
                                        <li class="menu-item">
                                            <a href="#">Academiics</a>
                                        </li>
                                        <li class="menu-item"><a href="#">Adminisitration</a></li>
                                        <li class="menu-item">
                                            <a href="#">Office of the Chancellor</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">E-Learning</a>
                                        </li>
                                        <li class="menu-item"><a href="https://oer.imsu.edu.ng">E-Library</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="
                  kingster-footer-column kingster-item-pdlr kingster-column-15
                ">
                            <div id="gdlr-core-custom-menu-widget-3" class="
                    widget widget_gdlr-core-custom-menu-widget
                    kingster-widget
                  ">
                                <h3 class="kingster-widget-title">Quick Links</h3>
                                <span class="clear"></span>
                                <div class="menu-campus-life-container">
                                    <ul id="menu-campus-life" class="
                        gdlr-core-custom-menu-widget gdlr-core-menu-style-plain
                      ">
                                        <li class="menu-item">
                                            <a href="#">2017/2018 Pre-Degree Application</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">2017/2018 Pre-Degree Application Invoice</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">2016/2017 ICEP Invoice Generation</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">2016/2017 ICEP Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="
                  kingster-footer-column kingster-item-pdlr kingster-column-15
                ">
                            <div id="gdlr-core-custom-menu-widget-4" class="
                    widget widget_gdlr-core-custom-menu-widget
                    kingster-widget
                  ">
                                <h3 class="kingster-widget-title">Academics</h3>
                                <span class="clear"></span>
                                <div class="menu-academics-container">
                                    <ul id="menu-academics" class="
                        gdlr-core-custom-menu-widget gdlr-core-menu-style-plain
                      ">
                                        <li class="menu-item"><a href="#">PostGraduate</a></li>
                                        <li class="menu-item"><a href="#">UnderGraduate</a></li>
                                        <li class="menu-item"><a href="#">Alumni</a></li>
                                        <li class="menu-item">
                                            <a href="#">Check Admission Status</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Apply For Admissions</a>
                                        </li>
                                        <li class="menu-item"><a href="#">Pay My Tuition</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kingster-copyright-wrapper">
                    <div class="kingster-copyright-container kingster-container clearfix">
                        <div class="kingster-copyright-left kingster-item-pdlr">
                            Copyright @ Imo State University, 2020. All Rights Reserved
                        </div>
                        <div class="kingster-copyright-right kingster-item-pdlr">
                            <div class="
                    gdlr-core-social-network-item
                    gdlr-core-item-pdb
                    gdlr-core-none-align
                  " id="div_1dd7_112">
                                <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="google-plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="skype">
                                    <i class="fa fa-skype"></i>
                                </a>
                                <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script type="text/javascript" src="{{ URL::asset('homepage/js/jquery/jquery-migrate.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//code.tidio.co/4nykxxypj44wasvmiwqhqvwyjv45pktf.js" async></script>

    @yield('scripts')

    <script type="text/javascript">
        /*<![CDATA[*/
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (
                    (e.responsiveLevels &&
                        (jQuery.each(e.responsiveLevels, function(e, f) {
                                f > i && ((t = r = f), (l = e)),
                                    i > f && f > r && ((r = f), (n = e));
                            }),
                            t > r && (l = n)),
                        (f = e.gridheight[l] || e.gridheight[0] || e.gridheight),
                        (s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth),
                        (h = i / s),
                        (h = h > 1 ? 1 : h),
                        (f = Math.round(h * f)),
                        "fullscreen" == e.sliderLayout)
                ) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c)
                            jQuery.each(c, function(e, i) {
                                u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u;
                            }),
                            e.fullScreenOffset.split("%").length > 1 &&
                            void 0 != e.fullScreenOffset &&
                            e.fullScreenOffset.length > 0 ?
                            (u -=
                                (jQuery(window).height() *
                                    parseInt(e.fullScreenOffset, 0)) /
                                100) :
                            void 0 != e.fullScreenOffset &&
                            e.fullScreenOffset.length > 0 &&
                            (u -= parseInt(e.fullScreenOffset, 0));
                    }
                    f = u;
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f,
                });
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d);
            }
        } /*]]>*/
    </script>
    <script>
        (function(body) {
            "use strict";
            body.className = body.className.replace(/\btribe-no-js\b/, "tribe-js");
        })(document.body);
    </script>
    <script>
        var tribe_l10n_datatables = {
            aria: {
                sort_ascending: ": activate to sort column ascending",
                sort_descending: ": activate to sort column descending",
            },
            length_menu: "Show _MENU_ entries",
            empty_table: "No data available in table",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            info_empty: "Showing 0 to 0 of 0 entries",
            info_filtered: "(filtered from _MAX_ total entries)",
            zero_records: "No matching records found",
            search: "Search:",
            all_selected_text: "All items on this page were selected. ",
            select_all_link: "Select all pages",
            clear_selection: "Clear Selection.",
            pagination: {
                all: "All",
                next: "Next",
                previous: "Previous",
            },
            select: {
                rows: {
                    0: "",
                    _: ": Selected %d rows",
                    1: ": Selected 1 row",
                },
            },
            datepicker: {
                dayNames: [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                ],
                dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
                monthNames: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                monthNamesShort: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ],
                monthNamesMin: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                nextText: "Next",
                prevText: "Prev",
                currentText: "Today",
                closeText: "Done",
                today: "Today",
                clear: "Clear",
            },
        };
        var tribe_system_info = {
            sysinfo_optin_nonce: "a32c675aaa",
            clipboard_btn_text: "Copy to clipboard",
            clipboard_copied_text: "System info copied",
            clipboard_fail_text: 'Press "Cmd + C" to copy',
        };
    </script>

    <script type="text/javascript">
        /*<![CDATA[*/
        function revslider_showDoubleJqueryError(sliderID) {
            var errorMessage =
                "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
            errorMessage +=
                "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
            errorMessage +=
                "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
            errorMessage +=
                "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
            errorMessage =
                "<span style='font-size:16px;color:#BC0C06;'>" +
                errorMessage +
                "</span>";
            jQuery(sliderID).show().html(errorMessage);
        } /*]]>*/
    </script>

    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/goodlayers-core/plugins/combine/script.js')}}"></script>
    <script type="text/javascript">
        var gdlr_core_pbf = {
            admin: "",
            video: {
                width: "640",
                height: "360",
            },
            ajax_url: "https:\/\/demo.goodlayers.com\/kingster\/wp-admin\/admin-ajax.php",
        };
    </script>
    <script type="text/javascript" src="{{ URL::asset('homepage/plugins/goodlayers-core/include/js/page-builder.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('homepage/js/jquery/ui/effect.min.js')}}"></script>
    <script type="text/javascript">
        var kingster_script_core = {
            home_url: "https:\/\/demo.goodlayers.com\/kingster\/",
        };
    </script>
    <script type="text/javascript" src="{{ URL::asset('homepage/js/plugins.min.js')}}"></script>
    <script>
        /*<![CDATA[*/
        var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
        var htmlDivCss = "";
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement("div");
            htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
            document
                .getElementsByTagName("head")[0]
                .appendChild(htmlDiv.childNodes[0]);
        } /*]]>*/
    </script>
    <script type="text/javascript">
        /*<![CDATA[*/
        if (setREVStartSize !== undefined)
            setREVStartSize({
                c: "#rev_slider_1_1",
                gridwidth: [1380],
                gridheight: [713],
                sliderLayout: "auto",
            });
        var revapi1, tpj;
        (function() {
            if (!/loaded|interactive|complete/.test(document.readyState))
                document.addEventListener("DOMContentLoaded", onLoad);
            else onLoad();

            function onLoad() {
                if (tpj === undefined) {
                    tpj = jQuery;
                    if ("off" == "on") tpj.noConflict();
                }
                if (tpj("#rev_slider_1_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_1_1");
                } else {
                    revapi1 = tpj("#rev_slider_1_1")
                        .show()
                        .revolution({
                            sliderType: "standard",
                            jsFileLocation: "//demo.goodlayers.com/kingster/wp-content/plugins/revslider/public/assets/js/",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 9000,
                            navigation: {
                                keyboardNavigation: "off",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation: "off",
                                mouseScrollReverse: "default",
                                onHoverStop: "off",
                                touch: {
                                    touchenabled: "on",
                                    touchOnDesktop: "off",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false,
                                },
                                arrows: {
                                    style: "uranus",
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_under: 1500,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    tmp: "",
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 20,
                                        v_offset: 0,
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 20,
                                        v_offset: 0,
                                    },
                                },
                                bullets: {
                                    enable: true,
                                    hide_onmobile: false,
                                    hide_over: 1499,
                                    style: "uranus",
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 30,
                                    space: 7,
                                    tmp: '<span class="tp-bullet-inner"></span>',
                                },
                            },
                            visibilityLevels: [1240, 1024, 778, 480],
                            gridwidth: 1380,
                            gridheight: 713,
                            lazyType: "none",
                            shadow: 0,
                            spinner: "off",
                            stopLoop: "off",
                            stopAfterLoops: -1,
                            stopAtSlide: -1,
                            shuffle: "off",
                            autoHeight: "off",
                            disableProgressBar: "on",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                nextSlideOnWindowFocus: "off",
                                disableFocusListener: false,
                            },
                        });
                }
            }
        })(); /*]]>*/
    </script>
    <script>
        /*<![CDATA[*/
        var htmlDivCss = unescape(
            "%23rev_slider_1_1%20.uranus.tparrows%20%7B%0A%20%20width%3A50px%3B%0A%20%20height%3A50px%3B%0A%20%20background%3Argba%28255%2C255%2C255%2C0%29%3B%0A%20%7D%0A%20%23rev_slider_1_1%20.uranus.tparrows%3Abefore%20%7B%0A%20width%3A50px%3B%0A%20height%3A50px%3B%0A%20line-height%3A50px%3B%0A%20font-size%3A40px%3B%0A%20transition%3Aall%200.3s%3B%0A-webkit-transition%3Aall%200.3s%3B%0A%20%7D%0A%20%0A%20%20%23rev_slider_1_1%20.uranus.tparrows%3Ahover%3Abefore%20%7B%0A%20%20%20%20opacity%3A0.75%3B%0A%20%20%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%7B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C%200%29%3B%0A%20%20-webkit-transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20background%3Atransparent%3B%0A%20%20width%3A15px%3B%0A%20%20height%3A15px%3B%0A%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20%7B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C1%29%3B%0A%20%20border%3Anone%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background%3Atransparent%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet-inner%20%7B%0A%20%20-webkit-transition%3A%20background-color%200.3s%20ease%2C%20-webkit-transform%200.3s%20ease%3B%0A%20%20transition%3A%20background-color%200.3s%20ease%2C%20transform%200.3s%20ease%3B%0A%20%20top%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20height%3A%20100%25%3B%0A%20%20outline%3A%20none%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background-color%3A%20rgb%28255%2C%20255%2C%20255%29%3B%0A%20%20background-color%3A%20rgba%28255%2C%20255%2C%20255%2C%200.3%29%3B%0A%20%20text-indent%3A%20-999em%3B%0A%20%20cursor%3A%20pointer%3B%0A%20%20position%3A%20absolute%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%20.tp-bullet-inner%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20.tp-bullet-inner%7B%0A%20transform%3A%20scale%280.4%29%3B%0A%20-webkit-transform%3A%20scale%280.4%29%3B%0A%20background-color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%7D%0A"
        );
        var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement("div");
            htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
            document
                .getElementsByTagName("head")[0]
                .appendChild(htmlDiv.childNodes[0]);
        } /*]]>*/
    </script>
</body>

</html>