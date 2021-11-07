@extends('layouts.master')
<link rel="stylesheet" href="/assets/qrscanner/style.css" />
<script src="/assets/qrscanner/qr.js"></script>
@section('title')
Student || Course
@endsection
@section('content')

<section class="">
  <div class="col-lg-12"><h4><br>Mark Exam Attendance for {{$crs->course_name}} ({{$crs->course_code}})</h4></div>
  <div class="col-lg-12">
    <!-- <form method="post" class="card"> -->
        <a href="/admin/exam-attendance" class="btn btn-primary">Back</a>
      @csrf
      <div class="card">
      <a id="btn-scan-qr" class="text-center">
            <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg">
        </a>

        <canvas hidden="" id="qr-canvas"></canvas>
        <div class="text-center">
            <small class="text-center">Step 1: Click on the qrscanner to scan the qrcode or type the Matric number below <br></small> <br>
        </div>
        <div class="col-md-12">
            @include('homepage.flash_message')
        </div>
        <div id="qr-result" hidden="">
            <b>Data:</b>
            <form method="post">
                <input type="text" id="outputData" name="matric_number">
                @csrf
                <button type="submit" class="btn btn-primary">Checkin</button>
            </form>
            <!-- <a href="#"> <span id="outputData"></span></a> -->
        </div>

        
        <form method="post" class="row col-lg-12 text-center">
            <input type="text" class="col-lg-10 form-control" placeholder="Matric number" name="matric_number">
            @csrf
            <button type="submit" class="btn btn-primary col-lg-2"><i class="fa fa-sign-in"></i>Check-In</button>
        </form>
        
      </div>
      
    <!-- </form> -->
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
          placeholder: "Select a course",
          allowClear: true
      });
      $("#multiple").select2({
          placeholder: "Select a programming language",
          allowClear: true
      });
    </script>
    
<script src="/assets/qrscanner/qrCodeScanner.js"></script>
@endsection