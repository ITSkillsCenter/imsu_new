<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="{{asset('transcript/dist/css/bootstrap.css')}}" >
	<title>Admit Card</title>
<style type="text/css">
h3{
	font-family: monospace;
	font-size: 30px;
}
p{
	font-size: 25px;
	line-height: .75;
}

.page-break {
    page-break-after: always;
}
.break{
  page-break-before: always;
}

	</style>
</head>
<body>
	<br>
	<br>
	@foreach($students as $student)
	<br>
	<br>
	<div style="margin-top:10px;" class="container-fluid <?php if(($loop->index+1)%2==0){?>break<?php }?>"> 
		
	  <div class="row">
	  	<div class="col-1">
         
         <img style="float: right;" height="75px;" width="75px;" src="{{asset('assets/images/logo.png')}}" />
        </div>
	      <div class="col-11" >
	        <h3 style="letter-spacing: 1.5px!important; word-spacing: -7px;">বাংলাদেশ আর্মি ইন্টারন্যাশনাল ইউনিভার্সিটি অব সায়েন্স এন্ড টেকনোলজি, কুমিল্লা সেনানিবাস<br> <span style="
    letter-spacing: -1.5px !important;
    word-spacing: -8px !important;">BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT</span></h3>
	         
	      </div> 
    	</div>
    	<div class="row">
    		<div class="col-11 text-center">
    			<h2>ADMIT CARD</h2>
    			<h2>RETAKE/IMPROVEMENT/BACKLOG, {{$session}}</h2>
    			<h6 style="font-size: 27px;">{{$department}}</h6>
    			<h6 style="font-size: 27px;">Level: {{substr($level_term,-3,1)}} Term: {{substr($level_term,-1)}}</h6>
    		</div>
    	<div class="col-1">
         
         <img style="float: left; margin-left:-215px; margin-top:5px;" height="120px;" width="100px;" src="{{asset($student->Photo)}}" />
        </div>
    	</div>
	</div>
	<div class="container" style="font-size: 27px;">
		<table width="100%">
        	<tr>
        		<td>Student's ID No:</td>
        		<td> {{$student->Registration_Number}}</td>
				<td>Student's Name:</td>
				<td> {{$student->Full_Name}}</td>
        	</tr>
        </table>
        
	</div>
	<br>
	<br>
	<div class="container-fluid" style="font-size: 27px;">
		<center>
		 <table border="1" cellpadding="5px">
        		<tr>
        		<td><b>Course Code</b></td>
                @foreach($datas as $key=>$value)
        		<td> {{$value}}</td>
                @endforeach
        	</tr>
        </table>
        </center>
        <br>
        <table width="100%">
        	<tr>
        		<td>...........................................................<br>Student's Signature and Date:</td>
        		<td> SEAL</td>
				<td align="right">...............................................................................<br>Office of the Controller of Examinations</td>
        	</tr>
        </table>
        <br>
        <h2>Instructions for the Examinees:</h2>
        <p>1. Write your ID number and other particulars clearly.</p>
        <p>2. Receiving unauthorized assistance in the examination hall is a violation of academic regulations and is subjected to:</p>
        <p style="margin-left: 50px;">a. Loss of credit for the course.</p>
        <p style="margin-left: 50px;">b.Probation or dismissal from the University.</p>
        <p>3. Do not leave the examination room until one hour after examination hass commenced.</p>
        <p>4. No cell phone and programmable calculators are allowed.</p>
        <p>5. The decision of the invigilators or examination committee shall be considered final for the smooth conduct of examination.</p>
	</div>
<br>
<br>
<br>
<center><p style="font-size: 12px;">Design & Developed by:- <b>ICT Wing & Archive</b></p></center>
<hr>
<hr>
<br>


 
	@endforeach



</body>
</html>