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
	line-height: 1.2;
}

.page-break {
    page-break-after: always;
}
.break{
  page-break-before: always;
}

	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	
	<div style="margin-top:10px;" class="container-fluid"> 
		
	  <div class="row">
	  	<div class="col-2">
         
         <img style="float:right;" height="100px;" width="100px;" src="{{asset('assets/images/logo.png')}}" />
        </div>
	      <div class="col-10" >
	        <h3 style="letter-spacing: 1.5px!important; word-spacing: -7px;" class="text-center"> <span style="
    letter-spacing: -1.5px !important;
    word-spacing: -8px !important;">BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), CUMILLA CANTONMENT</span></h3>
	         
	      </div> 
    	</div>
    	<div class="row">
    		<div class="col-11 text-center">
    			<h2>ADMIT CARD</h2>
    			<h2>@if($session->reg_type==1)
						Term Final Examination
						@elseif($session->reg_type==2)
						Term Repeat
						@elseif($session->reg_type==3)
						Retake
						@elseif($session->reg_type==4)
						Improvement
						@endif {{$session->semester}}</h2>
    			<h6 style="font-size: 27px;">{{$department}}</h6>
    			<h6 style="font-size: 27px;">Level: {{substr($levelTerm->Current_semester,-3,1)}} Term: {{substr($levelTerm->Current_semester,-1)}}</h6>
    		</div>
    	<div class="col-1">
         
         <img style="float: right; margin-left:-215px; margin-top:5px;" height="120px;" width="100px;" src="{{asset($levelTerm->Photo)}}" />
        </div>
    	</div>
	</div>
	<div class="container" style="font-size: 27px;">
		<table width="100%">
        	<tr>
        		<td>Student's ID No:</td>
        		<td>{{ $sid }} </td>
				<td>Student's Name:</td>
				<td> {{ $levelTerm->Full_Name }} </td>
        	</tr>
        </table>
        
	</div>
	<br>
	<div class="container" style="font-size: 27px;">
		
		 <table class="table table-striped" >
        	<thead>
				<tr>
				<th>Course Code</th>
				<th>Course Title</th>
				</tr>
			</thead>
			<tbody>	
				@foreach($courses as $value)
				<tr>
				<td> {{$value->course_code}}</td>
				<td> {{$value->course_name}}</td>
				</tr>
				@endforeach
			</tbody>
        </table>
        
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

<center><p style="font-size: 12px;">Design & Developed by:- <b>ICT Wing & Archive</b></p></center>

<script>
	$(document).ready(function () { 
  window.print(); 
});
</script>
</body>
</html>