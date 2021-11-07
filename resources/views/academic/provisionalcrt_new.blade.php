@php
  $student = DB::table('student_infos')->select('Registration_Number','Full_Name','Program')->where('Registration_Number',$id)->first();


@endphp
 
<?php 
if($student->Program=='CSE'){
    $faculty="of Department of Computer Science & Engineering";
    
  $program = "Bachelor of Science in Computer Science & Engineering";
  
}else if($student->Program=='EEE'){
    $faculty="of Department of Electrical & Electronic Engineering ";
  $program = "Bachelor of Science in Electrical & Electronic Engineering";
  
}else if($student->Program=='CE'){
    $faculty="of Department of Civil Engineering  ";
  $program="Bachelor of Science in Civil Engineering";
  
}else if($student->Program=='BBA'){
    $faculty=" of Department of Business Administration ";
  $program="Bachelor of Business Administration";
  
}else if($student->Program=='LLB'){
   $faculty="of Department of Law ";
  $program="Bachelor of Laws";
  
}else{
    $faculty="of Department of English ";
      $program="Bachelor of Arts (Honours) in English";
}
?>



<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>Provisional Certificate</title>
  <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="{{asset('transcript/dist/css/bootstrap.css')}}" >


<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=UnifrakturMaguntia" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet"> 
<style>
body{
  width:100%;
  height:100%;
  
}

 #hed{
  font-family: 'Lobster', cursive;
 }
 #prov{
  font-family: 'UnifrakturMaguntia', cursive;
 }
 #hed2{
  font-family: 'UnifrakturMaguntia', cursive;
  
 }
#it1{
  font-family: 'Great Vibes', cursive;
font-size: 21px;
}
#it{
font-family: 'Great Vibes', cursive;
font-size: 23px;
word-spacing: 3px;
font-weight: normal;
 }
@media print { body.receipt { width: 58mm } } 
 @media print {
 @page {
  size: A4 landscape;
  max-height:100%;
  max-width:100%
  }
}

</style>
</head>
<body>
    @foreach($l1t1s as $mark)
    <?php 
    $id = $mark->Registration_Number;
    
    $std= DB::table('student_infos')->where('Registration_Number',$id)->first();
    if($mark->level='l1t1'){
      $fsem=$mark->semester;
      $facy=$mark->academic_year;
    }
    ?>
    @endforeach

    @foreach($l4t2s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l4t2'){
  $eightsem=$mark->semester;
  $eightacy=$mark->academic_year;
}
?>
@endforeach
  <!--#########  First Page Transcript Start Here  #########-->
  <div class="" >
    <div class="row">
      <div class="col-md-12" id="hed">
        &nbsp;
        &nbsp;
        <h2 class="text-center" style="font-size:47px; visibility:hidden;" >Bangladesh Army International University of Science and Technology
        </h2>
        <h3 class="text-center" style="font-size:47px; visibility:hidden;" >(BAIUST)</h3>
        <p class="text-center" style="font-size:27px; visibility:hidden;" >Cumilla, Bangladesh</p>
      </div> 
    </div>
    <div class="row">
        <div class="col-md-4">
          <p style="margin-left: 150px; font-size:20px;">Serial No: PC-{{$serial_no}}</p>
        </div>
        <div class="col-md-4 text-center" style="margin-bottom: 0px; visibility:hidden;">
         <img height="120px;" width="120px;" src="{{asset('assets/images/logo.png')}}" />
        </div>
        <div class="col-md-4" style="font-size:20px;">
          <p>ID No : {{$student->Registration_Number}}</p>
          <p>Session :{{ reset($semesters_1)->semester}} to 
            @if(count($semesters_4)>0)
            {{ end($semesters_4)->semester }}
            @elseif(count($semesters_3)>0)
            {{ end($semesters_3)->semester }}
            @else
            {{ end($semesters_2)->semester }}
            @endif
          </p>
        </div>
      </div>
      <br>
      <br>
      
      <div class="row">
        <div class="col-md-12 text-center" style="margin-top:2px;">
            <br>
          <h4 id="prov" style="font-size:40px;"><b>Provisional Certificate</b></h4>
          <h3 id="hed2" style="font-size:40px;"><b>{{$program}}</b></h3>
          <p id="it1" style="font-size:35px;"><b>This is to certify that<b></p>
          <h4 style="text-decoration: underline;"><b>{{$student->Full_Name}}</b></h4>
        </div>
      </div>
      <br>
      
      <div class="row" style="margin-left: 150px;margin-right: 150px;" >
        <div class="col-md-12" >
          <p id="it" style="font-size:35px; text-align: center;">{{$faculty}} has obtained the degree of <b>{{$program}} </b><?php if($student->Program=='BBA'){ echo " (Major in ". $major.")";}?> in  the examination held in {{ $complete_degree }}  and Obtained Cumulative Grade Point Average (CGPA) {{ $total_cgpa }} out of 4.00.</p>
        </div>
      </div>
      &nbsp;
      &nbsp;
      <div class="row" style="font-weight: normal;">
        <div class="col-md-4">
          <p style="margin-left: 150px;">Result Published on: {{$publish_result}}</p>
          <p style="margin-left: 150px;">Issued on: <?php echo date("d F Y");?></p>
          <p style="margin-left: 150px;">Prepared by: </p>
        </div>
        <div class="col-md-4" style="float:right;">
          <br>
         </h6>
          <br>
          <br>
          <br>
          <p style="margin-left: 30px; text-align: center;">Verified by:</p>
        </div>
        <div class="col-md-4" style="float:right;">
          <br>
          <br>
          <br>
          <br>
          <h6 style="margin-left: 150px; text-align: center;"><b>Controller of Examinations</b></h6>
         
        </div>
      </div>
      
      
      <p class="text-center"  style="font-weight: normal;"><b>N.B. This  provisional certificate must be surrendered while taking the original one.</b></p>

  </div>
   <!-- 
  <p style="page-break-after: always;">&nbsp;</p>
      <p style="page-break-before: always;">&nbsp;</p>
  -->
  <!-- Popper JS -->

</body>
</html>