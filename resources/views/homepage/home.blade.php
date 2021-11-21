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

   .hr{
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
   <div class="gdlr-core-pbf-wrapper hp1-col-services" data-skin="Blue Title" id="gdlr-core-wrapper-1">
      <div class="gdlr-core-pbf-background-wrap"></div>
      <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
         <div class="
            gdlr-core-pbf-wrapper-container
            clearfix
            gdlr-core-pbf-wrapper-full-no-space
            ">
            <div class="
               gdlr-core-pbf-wrapper-container-inner gdlr-core-item-mglr
               clearfix
               " id="div_1dd7_0">
               <div class="
                  gdlr-core-pbf-column
                  gdlr-core-column-15
                  gdlr-core-column-first
                  ">
                  <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" id="div_1dd7_1">
                     <div class="
                        gdlr-core-pbf-column-content
                        clearfix
                        gdlr-core-js
                        ">
                        <div class="gdlr-core-pbf-element">
                           <div class="
                              gdlr-core-column-service-item
                              gdlr-core-item-pdb
                              gdlr-core-left-align
                              gdlr-core-column-service-icon-left
                              gdlr-core-with-caption
                              gdlr-core-item-pdlr
                              " id="div_1dd7_2">
                              <div class="
                                 gdlr-core-column-service-media
                                 gdlr-core-media-image
                                 ">
                                 <img src="homepage/upload/icon-1.png" alt="" width="40" height="40" title="icon-1" />
                              </div>
                              <div class="gdlr-core-column-service-content-wrapper">
                                 <div class="gdlr-core-column-service-title-wrap">
                                    <h3 class="
                                       gdlr-core-column-service-title
                                       gdlr-core-skin-title
                                       " id="h3_1dd7_0">
                                       Undergraduate Admission
                                    </h3>
                                    <div class="
                                       gdlr-core-column-service-caption
                                       gdlr-core-info-font
                                       gdlr-core-skin-caption
                                       " id="div_1dd7_3"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="gdlr-core-pbf-column gdlr-core-column-15" id="gdlr-core-column-1">
                  <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" id="div_1dd7_4">
                     <div class="
                        gdlr-core-pbf-column-content
                        clearfix
                        gdlr-core-js
                        ">
                        <div class="gdlr-core-pbf-element">
                           <div class="
                              gdlr-core-column-service-item
                              gdlr-core-item-pdb
                              gdlr-core-left-align
                              gdlr-core-column-service-icon-left
                              gdlr-core-with-caption
                              gdlr-core-item-pdlr
                              " id="div_1dd7_5">
                              <div class="
                                 gdlr-core-column-service-media
                                 gdlr-core-media-image
                                 ">
                                 <img src="homepage/upload/icon-2.png" alt="" width="44" height="40" title="icon-2" />
                              </div>
                              <div class="gdlr-core-column-service-content-wrapper">
                                 <div class="gdlr-core-column-service-title-wrap">
                                    <h3 class="
                                       gdlr-core-column-service-title
                                       gdlr-core-skin-title
                                       " id="h3_1dd7_1">
                                       Postgraduate Admission
                                    </h3>
                                    <div class="
                                       gdlr-core-column-service-caption
                                       gdlr-core-info-font
                                       gdlr-core-skin-caption
                                       " id="div_1dd7_6"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="gdlr-core-pbf-column gdlr-core-column-15" id="gdlr-core-column-2">
                  <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" id="div_1dd7_7">
                     <div class="
                        gdlr-core-pbf-column-content
                        clearfix
                        gdlr-core-js
                        ">
                        <div class="gdlr-core-pbf-element">
                           <div class="
                              gdlr-core-column-service-item
                              gdlr-core-item-pdb
                              gdlr-core-left-align
                              gdlr-core-column-service-icon-left
                              gdlr-core-with-caption
                              gdlr-core-item-pdlr
                              " id="div_1dd7_8">
                              <div class="
                                 gdlr-core-column-service-media
                                 gdlr-core-media-image
                                 ">
                                 <img src="homepage/upload/icon-3.png" alt="" width="44" height="39" title="icon-3" />
                              </div>
                              <div class="gdlr-core-column-service-content-wrapper">
                                 <div class="gdlr-core-column-service-title-wrap">
                                    <h3 class="
                                       gdlr-core-column-service-title
                                       gdlr-core-skin-title
                                       " id="h3_1dd7_2">
                                       Continuing Education
                                    </h3>
                                    <div class="
                                       gdlr-core-column-service-caption
                                       gdlr-core-info-font
                                       gdlr-core-skin-caption
                                       " id="div_1dd7_9"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="gdlr-core-pbf-column gdlr-core-column-15" id="gdlr-core-column-3">
                  <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" id="div_1dd7_10">
                     <div class="
                        gdlr-core-pbf-column-content
                        clearfix
                        gdlr-core-js
                        ">
                        <div class="gdlr-core-pbf-element">
                           <div class="
                              gdlr-core-column-service-item
                              gdlr-core-item-pdb
                              gdlr-core-left-align
                              gdlr-core-column-service-icon-left
                              gdlr-core-with-caption
                              gdlr-core-item-pdlr
                              " id="div_1dd7_11">
                              <div class="
                                 gdlr-core-column-service-media
                                 gdlr-core-media-image
                                 ">
                                 <img src="homepage/upload/icon-4.png" alt="" width="41" height="41" title="icon-4" />
                              </div>
                              <div class="gdlr-core-column-service-content-wrapper">
                                 <div class="gdlr-core-column-service-title-wrap">
                                    <h3 class="
                                       gdlr-core-column-service-title
                                       gdlr-core-skin-title
                                       " id="h3_1dd7_3">
                                       Distance & Online Learning
                                    </h3>
                                    <div class="
                                       gdlr-core-column-service-caption
                                       gdlr-core-info-font
                                       gdlr-core-skin-caption
                                       " id="div_1dd7_12"></div>
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
   <!-- @if(count($announcement) > 0)
   <div class="gdlr-core-pbf-wrapper " style="padding: 90px 0px 60px 0px;">
      <div class="gdlr-core-pbf-background-wrap" style="background-color: #efefef ;"></div>
      <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
         <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
            <div class="gdlr-core-pbf-element">
               <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                  <div class="gdlr-core-tab-item-content-image-wrap clearfix" style="height: 500px;">
                     @foreach($announcement as $k=>$annc)
                     <div class="gdlr-core-tab-item-image gdlr-core-active" data-tab-id="{{$k}}"><span class="gdlr-core-tab-item-image-background" style="background-image: url({{'/uploads/images/articles/'.$annc->image}}) ;"></span>
                     </div>
                     @endforeach
                  </div>
                  <div class="gdlr-core-tab-item-wrap">
                     <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                        
                     </div>
                     <div class="gdlr-core-tab-item-content-wrap clearfix">
                        @foreach($announcement as $k=>$annc)
                        <div class="gdlr-core-tab-item-content  {{$k==0 ? 'gdlr-core-active' : ''}}" data-tab-id="{{$k}}" style="background-color: #ffffff ;">
                           <div style="padding-bottom: 10px;" class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top">
                              <div class="gdlr-core-title-item-title-wrap ">
                                 <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;text-transform: none ;color: #314e85 ;">
                                    {{$annc->heading}}<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                 </h3>
                              </div>
                           </div>
                           <div>{!!substr($annc->content,0,300)!!}... <br /><br><a href='/article/{{$annc->id}}/{{str_slug($annc->heading, '-')}}' class='btn btn-primary btn-xs' style="color:white">Read More</a>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif -->
   <div class="gdlr-core-pbf-wrapper" id="gdlr-core-wrapper-2">
      <div class="gdlr-core-pbf-background-wrap">
         <div class="
            gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js
            " id="div_1dd7_13" data-parallax-speed="0.8"></div>
      </div>
      <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
         <div class="
            gdlr-core-pbf-wrapper-container
            clearfix
            gdlr-core-container-custom
            ">
            <div class="
               gdlr-core-pbf-column
               gdlr-core-column-20
               gdlr-core-column-first
               ">
               <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" id="div_1dd7_14" data-sync-height="height-1">
                  <div class="gdlr-core-pbf-background-wrap">
                     <div class="
                        gdlr-core-pbf-background
                        gdlr-core-parallax
                        gdlr-core-js
                        " id="div_1dd7_15" data-parallax-speed="0"></div>
                  </div>
                  <div class="
                     gdlr-core-pbf-column-content2
                     clearfix
                     gdlr-core-js gdlr-core-sync-height-content
                     ">
                     <div class="kcont">
                        <p>Prof. Peter Achunike Akah</p>
                        <p class="subtitle"><span>Ag. Vice Chancellor</span></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="gdlr-core-pbf-column gdlr-core-column-40" id="gdlr-core-column-4">
               <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" id="div_1dd7_16" data-sync-height="height-1">
                  <div class="gdlr-core-pbf-background-wrap">
                     <div class="
                        gdlr-core-pbf-background
                        gdlr-core-parallax
                        gdlr-core-js
                        " id="div_1dd7_17" data-parallax-speed="0.1"></div>
                  </div>
                  <div class="
                     gdlr-core-pbf-column-content
                     clearfix
                     gdlr-core-js gdlr-core-sync-height-content
                     ">
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-title-item gdlr-core-item-pdb
                           clearfix
                           gdlr-core-left-align
                           gdlr-core-title-item-caption-bottom
                           gdlr-core-item-pdlr
                           " id="div_1dd7_18">
                           <div class="gdlr-core-title-item-title-wrap clearfix">
                              <h3 class="
                                 gdlr-core-title-item-title
                                 gdlr-core-skin-title
                                 " id="h3_1dd7_4">
                                 Welcome to
                              </h3>
                           </div>
                           <span class="" id="span_1dd7_0">Imo State University</span>
                        </div>
                     </div>
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-text-box-item
                           gdlr-core-item-pdlr
                           gdlr-core-item-pdb
                           gdlr-core-left-align
                           " id="div_1dd7_19">
                           <div class="gdlr-core-text-box-item-content" id="div_1dd7_20">
                              <div class="row">
                                 <div class="col-md-12">
                                    <p>
                                       It is with great pleasure that I welcome you to
                                       Imo State University (IMSU). <br />
                                       IMSU was established in 1981 through law No. 4
                                       passed by the Imo State House of Assembly.
                                       Established with the vision of pursuing the
                                       advancement of learning and academic excellence,
                                       the university has been unrelenting in the
                                       pursuit of its mission of becoming a citadel of
                                       learning, a community with the trademark of
                                       excellence in teaching, research and service to
                                       humanity, a catalyst as well as an agent for
                                       development.
                                    </p>
                                 </div>
                                 {{--
                                 <div class="col-md-4 for_desktop">
                                    <p class="logo_bg">
                                       <img src="homepage/upload/logo1.png">
                                    </p>
                                 </div>
                                 --}}
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-button-item
                           gdlr-core-item-pdlr
                           gdlr-core-item-pdb
                           gdlr-core-left-align
                           ">
                           <!-- <a class="
                              gdlr-core-button
                              gdlr-core-button-solid
                              gdlr-core-button-no-border
                              " href="#" id="a_1dd7_0"><span class="gdlr-core-content">Read More</span></a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="gdlr-core-pbf-wrapper mt-xs-40" id="div_1dd7_30" data-skin="Column Service">
      <div class="gdlr-core-pbf-background-wrap" id="div_1dd7_31"></div>
      <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
         <div class="
            gdlr-core-pbf-wrapper-container
            clearfix
            gdlr-core-container
            ">
            <h3 class="discover">Discover IMSU</h3>
            <div class="
               gdlr-core-pbf-column
               gdlr-core-column-15
               gdlr-core-column-first
               ">
               <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                  <div class="
                     gdlr-core-pbf-column-content
                     clearfix
                     gdlr-core-js
                     ">
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-column-service-item
                           gdlr-core-item-pdb
                           gdlr-core-left-align
                           gdlr-core-column-service-icon-top
                           gdlr-core-no-caption
                           gdlr-core-item-pdlr
                           " id="div_1dd7_32">
                           <div class="
                              gdlr-core-column-service-media
                              gdlr-core-media-image text-center
                              " id="div_1dd7_33">
                              <img src="homepage/upload/col-icon-1.png" alt="" width="41" height="41" title="col-icon-1" />
                           </div>
                           <div class="gdlr-core-column-service-content-wrapper">
                              <div class="gdlr-core-column-service-title-wrap">
                                 <h3 class="
                                    gdlr-core-column-service-title
                                    gdlr-core-skin-title text-center
                                    " id="h3_1dd7_6">
                                    Scholarship & Financial Aids
                                 </h3>
                              </div>
                              <div class="gdlr-core-column-service-content text-center" id="div_1dd7_34">
                                 <p>
                                    Imo State University offers limited need and
                                    merit based scholarship and financial aids.
                                    Find out more..
                                 </p>
                                 <a class="
                                    gdlr-core-column-service-read-more
                                    gdlr-core-info-font
                                    " href="/scholarship" id="a_1dd7_1">Learn More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="gdlr-core-pbf-column gdlr-core-column-15" id="gdlr-core-column-5">
               <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                  <div class="
                     gdlr-core-pbf-column-content
                     clearfix
                     gdlr-core-js
                     ">
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-column-service-item
                           gdlr-core-item-pdb
                           gdlr-core-left-align
                           gdlr-core-column-service-icon-top
                           gdlr-core-no-caption
                           gdlr-core-item-pdlr
                           " id="div_1dd7_35">
                           <div class="
                              gdlr-core-column-service-media
                              gdlr-core-media-image text-center
                              " id="div_1dd7_36">
                              <img src="homepage/upload/col-icon-2.png" alt="" width="43" height="45" title="col-icon-2" />
                           </div>
                           <div class="gdlr-core-column-service-content-wrapper">
                              <div class="gdlr-core-column-service-title-wrap">
                                 <h3 class="
                                    gdlr-core-column-service-title
                                    gdlr-core-skin-title text-center
                                    " id="h3_1dd7_7">
                                    Campus<br>Life
                                 </h3>
                              </div>
                              <div class="gdlr-core-column-service-content text-center" id="div_1dd7_37">
                                 <p>
                                    IMSU Campus Life is the official Imo State
                                    University, Owerri welfare and entertainment
                                    unit created to ...
                                 </p>
                                 <a class="
                                    gdlr-core-column-service-read-more
                                    gdlr-core-info-font
                                    " href="#" id="a_1dd7_2">Learn More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="gdlr-core-pbf-column gdlr-core-column-15" id="gdlr-core-column-6">
               <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                  <div class="
                     gdlr-core-pbf-column-content
                     clearfix
                     gdlr-core-js
                     ">
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-column-service-item
                           gdlr-core-item-pdb
                           gdlr-core-left-align
                           gdlr-core-column-service-icon-top
                           gdlr-core-no-caption
                           gdlr-core-item-pdlr
                           " id="div_1dd7_38">
                           <div class="
                              gdlr-core-column-service-media
                              gdlr-core-media-image text-center
                              " id="div_1dd7_39">
                              <img src="homepage/upload/col-icon-3.png" alt="" width="40" height="43" title="col-icon-3" />
                           </div>
                           <div class="gdlr-core-column-service-content-wrapper">
                              <div class="gdlr-core-column-service-title-wrap">
                                 <h3 class="
                                    gdlr-core-column-service-title
                                    gdlr-core-skin-title text-center
                                    " id="h3_1dd7_8">
                                    Research and <br>Innovation
                                 </h3>
                              </div>
                              <div class="gdlr-core-column-service-content text-center" id="div_1dd7_40">
                                 <p>
                                    Through research and innovation, IMSU aims to
                                    become one of the most world-class ...
                                 </p>
                                 <a class="
                                    gdlr-core-column-service-read-more
                                    gdlr-core-info-font
                                    " href="#" id="a_1dd7_3">Learn More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="gdlr-core-pbf-column gdlr-core-column-15" id="gdlr-core-column-7">
               <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                  <div class="
                     gdlr-core-pbf-column-content
                     clearfix
                     gdlr-core-js
                     ">
                     <div class="gdlr-core-pbf-element">
                        <div class="
                           gdlr-core-column-service-item
                           gdlr-core-item-pdb
                           gdlr-core-left-align
                           gdlr-core-column-service-icon-top
                           gdlr-core-no-caption
                           gdlr-core-item-pdlr
                           " id="div_1dd7_41">
                           <div class="
                              gdlr-core-column-service-media
                              gdlr-core-media-image text-center
                              " id="div_1dd7_42">
                              <img src="homepage/upload/col-icon-4.png" alt="" width="47" height="47" title="col-icon-4" />
                           </div>
                           <div class="gdlr-core-column-service-content-wrapper">
                              <div class="gdlr-core-column-service-title-wrap">
                                 <h3 class="
                                    gdlr-core-column-service-title
                                    gdlr-core-skin-title text-center
                                    " id="h3_1dd7_9">
                                    School<br>Alumni
                                 </h3>
                              </div>
                              <div class="gdlr-core-column-service-content text-center" id="div_1dd7_43">
                                 <p>
                                    Request for your transcript. Login to view
                                    shipment progress. Receive update emails on
                                    shipment...
                                 </p>
                                 <a class="
                                    gdlr-core-column-service-read-more
                                    gdlr-core-info-font
                                    " href="#" id="a_1dd7_4">Learn More</a>
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

   <section style="background-color:#f7fcf9; width: 100%; margin:auto; padding-top:5%;">
      <div class="" style="margin-left:3%; margin-right:3%;">
         <div class="row">
            <div class="col-md-3">
               <div class="row" style="margin:0px;">
                  <h4 style="color: #3db166;">Our Faculties</h4>
                  <div class=" col-md-12" style="background-color: #3c5143; padding:4%; border-radius: 5px 5px 5px 5px; font-size:13px;">
                     @foreach($faculties as $faculty)
                     <p style="">
                        <a href="/faculty/{{$faculty->slug}}" style="color: white;" target="_self">{{$faculty->name}}</a>
                     </p>
                     @endforeach
                  </div>
               </div>

               <div class="row" style="margin-right:0px; margin-left:0px; margin-top:25px;;">
                  <div class="card" style="margin-bottom:10%; padding-bottom:18px; background-color:#F7FCF9; box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25)">
                     <img src="homepage/upload/hp-donation-400x212.jpg" class="card-img-top img-fluid" alt="...">
                     <div class="card-body">
                        <div class="card-text">
                           <h4 style="color: #349857;">IMSU ALUMNI</h4>

                        </div>
                        <p class="card-text">
                           <strong>IMSU Alumni</strong> Platform is specially designed to bring all
                           ex-students of Imo State University together (irrespective of where they live in the
                           world)
                           as one big caring family; dedicated to the wellbeing of one another, the university
                           and the world at large

                        </p>

                        <p class="card-text">
                           <button type="button" class="btn--outline--success">Click here to know more</button>

                        </p>
                     </div>

                  </div>
               </div>

            </div>

            <div class="col-md-6">
               <div class="row" style="margin:0px;">
                  <div class="col-md-12">
                     <h4 style="color: #3db166; ">Latest News and Updates</h4>
                  </div>
                  <div class="col-md-12">


                     @forelse ( $articles as $article )
                     <div class="my-card">
                        <div style="display: flex; justify-content:space-between; width:75%">
                           <div class="card-date">
                              <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; {{date("F j, Y", strtotime($article->published_at))}}
                           </div>
                           <div>{{$article->category->name}}</div>
                        </div>

                        <div class="card-title"> <a href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">{{$article->heading}} </a> </div>
                        <div class="card-text">

                           {{trimString($article->content, 300)}}


                           <a style="color: green;" href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">
                              Continue reading
                           </a>


                        </div>
                        <div class="hr"></div>

                     </div>
                     @empty

                     @endforelse
                     <br><br>
                     <div><a style="color: green; text-decoration:underline" href="/article">View All</a></div>


                  </div>
               </div>


            </div>

            <div class="col-md-3 ">
               <div class="row" style="margin:0px;">
                  <div class="col-md-12">
                     <h4 style="color: #3db166;">Upcoming Events </h4>
                     @if(count($events) > 0)
                        @foreach($events as $event)
                        <div class="card" style="margin-bottom:10%; background-color:#f7f7f7;">
                           <img src="homepage/images/Rectangle49.png" class="card-img-top img-fluid" alt="...">
                           <div class="card-body">
                              <!-- <p class="card-text"></p> -->
                           </div>
                           <div class="card-footer" style="padding:10px;">
                              <div>
                                 <h6>
                                    {{$event->heading}} <span class="pull-right btn btn-success"><a href="/article/{{$event->id}}/{{str_slug($event->heading, '-')}}">Read more </a></span>
                                 </h6>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     @else
                     <h6>No upcoming events</h6>
                     @endif
                  </div>



               </div>
            </div>

         </div>
      </div>




      <div class="row">
         <div class="gdlr-core-pbf-element">
            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px ;">
               <div class="gdlr-core-title-item-title-wrap clearfix" style="width: 100%; text-align:center">
                  <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #223d71 ;margin-right: 30px ; float:inherit">
                     Downloads
                  </h3>
                  <!-- <div class="gdlr-core-title-item-divider gdlr-core-right gdlr-core-skin-divider" style="font-size: 22px ;border-bottom-width: 3px ;"></div> -->
               </div>
            </div>
         </div>
         <div class="gdlr-core-pbf-column gdlr-core-column-15 gdlr-core-column-first ">
            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px -7px 0px 0px;">
               <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                  <div class="gdlr-core-pbf-element">
                     <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align ">
                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer min_h card-info" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;">
                           <div class="gdlr-core-feature-box-background" style="background-image: url(upload/shutterstock_209187682.jpg) ;opacity: 0.14 ;"></div>
                           <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                              <h3 class="gdlr-core-feature-box-item-title" style="font-size: 14px ;font-weight: 600 ;">
                                 2020/2021 Academic Calendar <br><br>
                              </h3>
                           </div>
                           <a class="gdlr-core-feature-box-link" href="/docs/IMSU_ACADEMIC_CALENDAR.docx" target="_self" download></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="gdlr-core-pbf-column gdlr-core-column-10">
            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px -3px 0px -3px;">
               <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                  <div class="gdlr-core-pbf-element">
                     <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer min_h card-info" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;">
                           <div class="gdlr-core-feature-box-background" style="background-image: url(upload/major-bg-2.jpg) ;opacity: 0.14 ;"></div>
                           <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                              <h3 class="gdlr-core-feature-box-item-title" style="font-size: 14px ;font-weight: 600 ;">
                                 List of Faculties and Departments
                              </h3>
                           </div>
                           <a class="gdlr-core-feature-box-link" href="/docs/IMSU_Faculties_and_Departments.docx" target="_self" download></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="gdlr-core-pbf-column gdlr-core-column-10">
            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 0px -7px;padding: 0px 0px 45px 0px;">
               <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                  <div class="gdlr-core-pbf-element">
                     <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer min_h card-info" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;">
                           <div class="gdlr-core-feature-box-background" style="background-image: url(upload/support-image-3.jpg) ;opacity: 0.14 ;"></div>
                           <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                              <h3 class="gdlr-core-feature-box-item-title" style="font-size: 14px ;font-weight: 600 ;">
                                 Student Handbook <br><br>
                              </h3>
                           </div>
                           <a class="gdlr-core-feature-box-link" href="#" target="_self"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="gdlr-core-pbf-column gdlr-core-column-10">
            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 0px -7px;padding: 0px 0px 45px 0px;">
               <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                  <div class="gdlr-core-pbf-element">
                     <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer min_h card-info" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;">
                           <div class="gdlr-core-feature-box-background" style="background-image: url(upload/support-image-3.jpg) ;opacity: 0.14 ;"></div>
                           <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                              <h3 class="gdlr-core-feature-box-item-title" style="font-size: 14px ;font-weight: 600 ;">
                                 IMSU Anthem <br><br>
                              </h3>
                           </div>
                           <a class="gdlr-core-feature-box-link" href="#" target="_self"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="gdlr-core-pbf-column gdlr-core-column-15">
            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 0px -7px;padding: 0px 0px 45px 0px;">
               <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                  <div class="gdlr-core-pbf-element">
                     <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                        <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer min_h card-info" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;">
                           <div class="gdlr-core-feature-box-background" style="background-image: url(upload/support-image-3.jpg) ;opacity: 0.14 ;"></div>
                           <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                              <h3 class="gdlr-core-feature-box-item-title" style="font-size: 14px ;font-weight: 600 ;">
                                 2020/2021 Supplementary Admission List
                              </h3>
                           </div>
                           <a class="gdlr-core-feature-box-link" href="#" target="_self"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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


      <!-- </div> -->
</div>
</div>
</div>
<div class="" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; top: 5%; position: absolute; margin: 0 auto;">
   <div class="modal-dialog" style="border: 0;" role="document">
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
                  <img src="homepage/upload/spgs_admission_popup.jpg" class="img-responsive" alt="">
               </a>
               <!-- <p>Registration of students on the portal has commenced Click here to register
                  </p> -->
                  <div class="row">
                     <a href="https://imsu.edu.ng/article/30/imsu-postgraduate-admission"><span class="btn btn-primary">Read More</span></a>
                     <a href="/admission-application#pg"><span class="btn btn-primary">Apply now</span></a>
                     
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="overlay"></div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
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