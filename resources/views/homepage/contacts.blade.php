@extends('layouts.homepage_layout')
@section('content')
<style>
    #content_body a{
        display: inline-block;
        padding: 30px 33px;
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

    .sub_heading{
        font-size: 30px !important;
        line-height: 40px;
    padding-left: 20px !important;
    border-bottom: 1px solid #3db165!important;
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
        background-color : #3db166;
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

    .min_h{
        min-height: 10px;
    }

    .gdlr-core-feature-box-item .gdlr-core-feature-box {
        position: relative;
        overflow: hidden;
        padding: 20px 10px;
    }
</style>
<div class="kingster-page-title-wrap  kingster-style-custom kingster-left-align" style="background-image: url(homepage/upload/slide_two.png) ;">
    <div class="kingster-header-transparent-substitute"></div>
    <div class="kingster-page-title-overlay"></div>
    <div class="kingster-page-title-bottom-gradient"></div>
    <div class="kingster-page-title-container kingster-container">
        <div class="kingster-page-title-content kingster-item-pdlr" style="height: 500px;display: flex; justify-content: center; align-items: center;">
            <!-- <div class="kingster-page-caption" style="font-size: 21px ;font-weight: 400 ;letter-spacing: 0px ;">Admission</div> -->
            <h1 class="kingster-page-title" style="font-size: 35px ;font-weight: 700 ;text-transform: none ;letter-spacing: 0px ;color: #ffffff ;">IMO STATE UNIVERSITY CONTACTS</h1>
        </div>
    </div>
</div>

<div class="#gdlr-core-wrapper-2 kingster-page-wrapper" id="kingster-page-wrapper">
   
    <!-- <br><br> -->

    <!-- <div class="col-lg-12 text-center">
        <div class="col-lg-8" style="border: 1px solid black; padding: 10px">

            <a href="{{url('login')}}" class="btn btn-lg btn-success" style="color: white;"><strong>Login</strong></a>   
            <a href="{{url('login')}}" class="btn btn-lg btn-success" style="color: white;"><strong>Login</strong></a>   
            <a href="{{url('login')}}" class="btn btn-lg btn-success" style="color: white;"><strong>Login</strong></a>   
            <a href="{{url('login')}}" class="btn btn-lg btn-success" style="color: white;"><strong>Login</strong></a>
        </div>
           
    </div> -->
    <br><br>


    <div class=" container" style="margin-bottom: 5%;">
        <div class="row">

           

            <div class="col-md-7">

                <div class="row">
                  <div class="col-md-12">
                    <h3 style="font-weight: normal; font-size:30px;">Please contact us through the following email addresses:</h3>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                          <h4 class="card-title">1. Vice Chancellor</h4>
                          <div class="m-5">
                            <p class="card-text"> <i class="fa fa-user"></i> Prof. Peter Akah</p>
                            <i class="fa fa-envelope"></i> <a  class="card-link" href="mailto:vc@imsu.edu.ng">vc@imsu.edu.ng</a> 
                          </div>
                        </div>
                      </div>
                </div>
    
                <div class="col-md-6" >
                    <div class="card">
                        <div class="card-body ">
                          <h4 class="card-title">2. Registrar</h4>
                          <div class="m-5">
                            <p class="card-text"> <i class="fa fa-user"></i> Dr. J.U. Osuagwu</p>
                            <i class="fa fa-envelope"></i> <a class="card-link" href="mailto:registrar@imsu.edu.ng">registrar@imsu.edu.ng</a>
                          </div>
                        </div>
                      </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                          <h4 class="card-title">3. University Librarian</h4>
                          <div class="m-5">
                            <p class="card-text"> <i class="fa fa-user"></i> Dr. Emeka Uchendu</p>
                            <i class="fa fa-envelope"></i>  <a href="mailto:librarian@imsu.edu.ng">librarian@imsu.edu.ng</a>
                          </div>
                        </div>
                      </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                          <h4 class="card-title">4. Bursar</h4>
                          <div class="m-5">
                            <p class="card-text"> <i class="fa fa-user"></i> Dr. OJ. Ebubudike Anyanwu</p>
                            <i class="fa fa-envelope"></i>  <a href="mailto:bursar@imsu.edu.ng">bursar@imsu.edu.ng</a>
                          </div>
                        </div>
                      </div>
                </div>
                
    
                <div class="col-md-6">
                    <div class="card"  style="padding-left:50px; padding-right:50px; padding-top:90px; padding-bottom:70px;">
                        <div class="card-body">
                          <h4 class="card-title">5. PAYMENT RELATED ISSUES</h4>
                          <div class="m-5">
                            <p class="card-text">For all Payment issues, contact BURSARY at: <a href="mailto:bursar@imsu.edu.ng">bursar@imsu.edu.ng</a></p>
                          </div>
                        </div>
                      </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card" style="padding-left:50px; padding-right:50px; padding-top:140px; padding-bottom:100px;">
                        <div class="card-body ">
                          <h4 class="card-title">6. ACADEMIC ISSUES </h4>
                          <div class="m-5">
                            <p class="card-text">For academic matter, including but not limited to transcript and certificate verification, IMSU REGISTRAR: <a href="mailto:registrar@imsu.edu.ng">registrar@imsu.edu.ng</a></p>
                          </div>
                        </div>
                      </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card" style="padding-left:50px; padding-right:50px; padding-top:90px; padding-bottom:70px;">
                        <div class="card-body">
                          <h4 class="card-title">7. FOR PORTAL/WEBSITE/EMAIL ISSUES </h4>
                          <div class="m-5">
                            <p class="card-text"> <i class="fa fa-envelope"></i> <a href="mailto:webservices@imsu.edu.ng">webservices@imsu.edu.ng</a></p>
                          </div>
                        </div>
                      </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body ">
                          <h4 class="card-title">8. FOR GENERAL ENQUIRY  </h4>
                          <div class="m-5">
                            <p class="card-text"> <i class="fa fa-envelope"></i> <a href="mailto:info@imsu.edu.ng">info@imsu.edu.ng</a></p>
                          </div>
                        </div>
                      </div>
                </div>
    
                </div>
            </div>

            <div class="col-md-5 border rounded pt-5" style="background-color:#eeeeee; padding-top:30px;padding-bottom:30px;">
              
              <div class="row">
                <div class="col-md-12">
                  @include('homepage.flash_message')
                </div>
                <div class="col-md-12">
                  <h3 style="font-weight: normal; font-size:20px; line-height:2.8rem;">If you have a special issue, kindly fill our general support/contact form and we will get back to you as soon as possible. </h3>
                </div>

                <form action="{{route('contact.submit')}}" method="POST">
                  @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" style="height: 55px;" name="full_name"  placeholder="Full name">
                    <span class="text-danger">{{ $errors->first('full_name') }}</span>

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" style="height: 55px;" name="email" placeholder="Email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" style="height: 55px;" name="phone_number" placeholder="Phone Number">
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                   <textarea name="message" class="form-control" style="height:200px;" name="message" placeholder="Type message"></textarea>
                   <span class="text-danger">{{ $errors->first('message') }}</span>

                   
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                <div id="html_element"></div>
                  
                  </div>
                </div>
              

                <div class="col-md-12">
                  <div class="form-group" >
                  <button id="submit_btn"  disabled type="submit" class="btn btn-primary btn-lg">Submit</button>
                  </div>
                </div>


               
                  
                </form>
                
              </div>
              
            </div>

          


            
        </div>
    </div>
    
    


</div>
</div>

<script type="text/javascript">
          document.getElementById('submit_btn').disabled = true;


  var verifyCallback = function(response) {
         if(response){
        document.getElementById('submit_btn').removeAttribute('disabled');

         }
  };

  var onloadCallback = function() {
    grecaptcha.render('html_element', {
      'sitekey' : '6LeVA8scAAAAALy1zsw8raQWvz7GZFS0mD5Zwmfe',
      'callback' : verifyCallback,
    });
  };

 
</script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async defer>
</script>
@endsection

<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  /* width: 15%; */
  height: 200px;
  background: white;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 5%;
  }
  
  .card:hover {
    cursor: pointer;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    /* width: 20%; */
    height: 250px;
  }

  .col-md-6{
    margin-top: 10px;
  }

  .card-title{
      font-size: 20px !important;;
  }
</style>