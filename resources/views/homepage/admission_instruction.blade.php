@extends('layouts.homepage_layout')
@section('content')
<style>
    #content_body a {
        display: inline-block;
        padding: 15px 33px;
        background-color: #3db166;
        color: white;
        text-decoration: none;
        border-radius: 50px;
    }

    /* Fixed sidenav, full height */
    .sidenav {
        min-height: 460px;
        height: 100%;
        width: 100%;
        z-index: 1;
        border: 1px solid #3db166;
        /* padding-left: 30px; */
        overflow-x: hidden;
        /* padding-top: 20px; */
    }

    .sub_heading {
        font-size: 15px !important;
        line-height: 40px;
        padding-left: 20px !important;
        border-bottom: 1px solid #3db165 !important;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
        border-radius: 3px;
    }

    /* On mouse-over */
    /* .sidenav a:hover,
    .dropdown-btn:hover {
        color:  #3db166;
    } */

    /* Main content */
    .main {
        margin-left: 200px;
        /* Same as the width of the sidenav */
        font-size: 20px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active {
        background-color: #3db166;
        color: white;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        /* background-color: #262626; */
        padding-left: 8px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
        float: right;
        padding-right: 8px;
        padding-top: 8px;
    }
</style>
<div class="kingster-page-title-wrap  kingster-style-custom kingster-left-align" style="background-image: url(homepage/upload/slide_two.png) ;">
    <div class="kingster-header-transparent-substitute"></div>
    <div class="kingster-page-title-overlay"></div>
    <div class="kingster-page-title-bottom-gradient"></div>
    <div class="kingster-page-title-container kingster-container">
        <div class="kingster-page-title-content kingster-item-pdlr" style="height: 500px;display: flex; justify-content: center; align-items: center;">
            <!-- <div class="kingster-page-caption" style="font-size: 21px ;font-weight: 400 ;letter-spacing: 0px ;">Admission</div> -->
            <h1 class="kingster-page-title" style="font-size: 35px ;font-weight: 700 ;text-transform: none ;letter-spacing: 0px ;color: #ffffff ;">IMO STATE UNIVERSITY ADMISSION INSTRUCTION</h1>
        </div>
    </div>
</div>

<div class="#gdlr-core-wrapper-2 kingster-page-wrapper" id="kingster-page-wrapper">
    <div class="gdlr-core-page-builder-body">

        <br><br>

        <div class="kingster-footer-container kingster-container clearfix">
            <div class="gdlr-core-pbf-column gdlr-core-column-15">
                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                        <div class="gdlr-core-pbf-element">
                            <div class="sidenav">
                                @foreach($categories as $category)
                                <button class="dropdown-btn">{{$category->name}}
                                    <i class="fa fa-caret-down"></i>
                                </button>

                                <div class="dropdown-container">
                                    @foreach($category->menus as $menu)
                                    <a class="sub_heading" data-id="{{$menu->id}}" data-heading="{{$menu->heading}}" data-content="{{$menu->content}}">{{$menu->heading}}</a>
                                    @endforeach
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gdlr-core-pbf-column gdlr-core-column-45">
                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                        <div class="gdlr-core-pbf-element">
                            <div class="class_style gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-background-title-icon gdlr-core-left-align gdlr-core-icon-pos-right">
                                <div class="gdlr-core-accordion-item-tab clearfix gdlr-core-active">
                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                    <div class="gdlr-core-accordion-item-content-wrapper">
                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content"> <span id="content_heading">{{$categories[0]->name}}</span></h4>
                                        <div class="gdlr-core-accordion-item-content" id="content_body">
                                            <div>{!!$categories[0]->menus[0]->content!!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gdlr-core-pbf-section">
            <div class="gdlr-core-pbf-section-container gdlr-core-container clearfix">
                <div class="gdlr-core-pbf-element">
                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 15px ;">
                        <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-color: #50bd77 ;border-bottom-width: 3px ;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>

    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            let all = $('.dropdown-btn')
            all.removeClass('active')
            $('.dropdown-btn').each(function(i, obj) {
                obj.nextElementSibling.style.display = "none";
            });

            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    $('.sub_heading').click(function() {
        // alert($(this).data('heading'))
        $('#content_heading').html($(this).data('heading'))
        $('#content_body').html($(this).data('content'))
    })
</script>
@endsection