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

@foreach($l1t2s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l1t2'){
  $ssem=$mark->semester;
  $seacy=$mark->academic_year;
}
?>
@endforeach

@foreach($l2t1s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l2t1'){
  $thsem=$mark->semester;
  $thacy=$mark->academic_year;
}
?>
@endforeach

@foreach($l2t2s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l2t2'){
  $foursem=$mark->semester;
  $fouracy=$mark->academic_year;
}
?>
@endforeach

@foreach($l3t1s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l3t1'){
  $fivesem=$mark->semester;
  $fiveacy=$mark->academic_year;
}
?>
@endforeach

@foreach($l3t2s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l3t2'){
  $sixsem=$mark->semester;
  $sixacy=$mark->academic_year;
}
?>
@endforeach

@foreach($l4t1s as $mark)
<?php 
$id = $mark->Registration_Number;

$std= DB::table('student_infos')->where('Registration_Number',$id)->first();
if($mark->level='l4t1'){
  $sevensem=$mark->semester;
  $sevenacy=$mark->academic_year;
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

@php
  $student = DB::table('student_infos')->select('Registration_Number','Full_Name','Program')->where('Registration_Number',$id)->first();


@endphp
 
<?php 
if($student->Program=='CSE'){
  $program = "Bachelor of Science in Computer Science & Engineering";
}else if($student->Program=='EEE'){
  $program = "Bachelor of Science in Electrical & Electronic Engineering";
}else if($student->Program=='CE'){
  $program="Bachelor of Science in Cvil Engineering";
}else if($student->Program=='BBA'){
  $program="Bachelor of Business Administration";
}else if($student->Program=='LLB'){
  $program="Bachelor of Law";
}else{
    $program="Bachelor of English";
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>Academic Record Transcript</title>
  <!-- Latest compiled and minified CSS -->


<link rel="stylesheet" href="{{asset('transcript/dist/css/bootstrap.css')}}" >
<style type="text/css" media="all">

  #border{
    width:100%;
    
    background-color: black;
  }
  .table th, .table td {
    padding: 0.2rem !important;
    vertical-align: middle!important;
    border-top: 1px solid #dee2e6;
}
 
  #grade p{
    font-size: 16px;
  }
  #academic p{
    font-size: 20px;
  }
  #table_grade tr td{
    font-size: 16px;
    border: 1px solid black;
    border-top: 1px solid black !important;
  }
  tr td{
    font-size: 16px;
    
  }
.page-break {
    page-break-after: always;
}
.break{
  page-break-before: always;
}
</style>
</head>
<body style="line-height: 1.2!important;">
  <br>
  <br>
  <!--#########  First Page Transcript Start Here  #########-->
  <div class="container">
    <div class="row" style="visibility:hidden;">
      <div class="col-md-6">
        <h4 style="text-align: right; ">Bangladesh Army International University of Science & Technology
        </h4>
        <p style="text-align: right; ">Cumilla, Bangladesh</p>
      </div>
      <div class="col-md-6">
        <img height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
        <div style="float:right;">
<p>Sponsored by</p>
<img align="center" style="margin-left: 30px;" height="40px;" width="40px;" src="{{asset('bdarmy.png')}}">
<p>Bangladesh Army</p>
          
        </div>
      </div>
    </div>
    <div id="border"><hr></div>
    <div class="row">
      <div class="col-md-12" id="academic">
        <h3 class="text-center">TRANSCRIPT OF ACADEMIC RECORD</h3>
          <p>Name :<b> <?php echo $std->Full_Name;?></b></p>
          <p class="float-lg-right">Student ID   :<b> <?php echo $std->Registration_Number;?>  </b></p> 
          <?php $bdate = str_replace('/', '-',$std->Date_of_Birth) ?>
          <p>Date of Birth:<b> <?php echo date("d M Y",strtotime($bdate));?></b></p>  
          <p>Degree Awarded:<b> {{$program}}</b></p>
          @if($std->Program=='BBA')  
          <p>Major: <b> {{ $major }}</b></p> 
          @endif
          <p>Duration of the Programme:<b>  {{$duration_program}}</b></p>   
          <p>Academic Years Attended: <b> {{ $fsem }} to {{ $eightsem }}</b></p>  
          <p>Date of Completion of the Degree: <b> {{$complete_degree}}</b></p>  
          <p>Medium of Instruction:<b> English</b> </p>  
     <?php 
        $std= DB::table('student_infos')->where('Registration_Number',$id)->first();
        if($std->Program=='CSE'||$std->Program=='CE'){
          $r_credit = '162';
        }else if($std->Program=='EEE'){
          $r_credit = '160';
        }else if($std->Program=='BBA'){
          $r_credit = '126';
        }else if($std->Program=='LLB'){
          $r_credit = '136';
        }else{
          $r_credit = '124';
        }
     ?>
          <p>Required Credit for Graduation:<b> {{$r_credit}}</b></p>  
  
          <p>Cumulative Grade Point Average (CGPA):<b> {{$total_cgpa}} </b>out of maximum:<b> 4.00</b></p>  
          <p>Transcript Number: <b>TS-{{$serial_no}}</b></p>  
          <p>Date of Issue: <?php echo date("d M Y");?></p>  
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <p>Prepared by: </p> 
        <p>Checked by: </p> 
      </div>
      <div class="col-md-6">
        <div id="border"><hr></div>
        <h6 class="text-center">Controller of Examinations</h6>
      </div>
    </div>
    <div id="border"><hr></div>
    <h5 style="margin:5px;"> Grading System</h5>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="grade">
          <table class="table" id=table_grade>
            <tbody>
              <tr>
                <td>A+ : 80% and above - 4.00 points/ credit</td>
                <td>A  : 75% to below 80% - 3.75 points/ credit</td>
              </tr>
              <tr>
                <td>A- : 70% to below 75% - 3.50 points/ credit</td>
                <td>B+ : 65% to below 70% - 3.25 points/ credit</td>
              </tr>
              <tr>
                <td>B  : 60% to below 65% - 3.00 points/ credit</td>
                <td>B- : 55% to below 60% - 2.75 points/ credit</td>
              </tr>
              <tr>
                <td>C+ : 50% to below 55% - 2.50 points/ credit</td>
                <td>C  : 45% to below 50% - 2.25 points/ credit</td>
              </tr>
              <tr>
                <td>D  : 40% to below 45% - 2.00 points/ credit</td>
                <td>F  : below 40% (F means Fail) - 0 points/ credit</td>
              </tr>
              <tr>
                <td>X  : Project/ Thesis continuation</td>
                <td>W  : Withdrawal</td>
              </tr>
              <tr>
                <td>I  : Incomplete</td>
                <td></td>
              </tr>
            </tbody>
          </table>
      </div>

    <div class="row">
      <div class="col-md-12"></div>
    </div>
  </div>
      <div class="row">
      <div class="col-md-4" >
      Cumulative Grade Point Average CGPA= 
      </div>
      <div class="col-md-8" id="grade">
        <span>&Sigma;</span> (Number of Credits in a Course x Grade Point Earned in That Course)
        <div class="col-md-10" style="background-color: black;"></div>
        Total Number of Credits Earned
      </div>
    </div>
        <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h5 class="text-center">CUMILLA, BANGLADESH</h5>
        <p class="text-center">Tel: 081-80124, 081-80125; Mob: +8801756436655 E-mail: info@baiust.edu.bd; website: www.baiust.edu.bd
</p>
      </div>
    </div>
</div>
<!--#########  First Page Transcript End Here  #########-->
<!--#########  Second Page Transcript Start Here  #########-->

<div class="container page-break break" >
  <div class="row" style="visibility:hidden;">
      <div class="col-md-6">
        <h4 style="text-align: right;">Bangladesh Army International University of Science & Technology
        </h4>
        <p style="text-align: right;">Cumilla, Bangladesh</p>
      </div>
      <div class="col-md-6">
        <img height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
    <div style="float:right;">
<p>Sponsored by</p>
<img align="center" style="margin-left: 30px;" height="40px;" width="40px;" src="{{asset('bdarmy.png')}}">
<p>Bangladesh Army</p>
          
        </div>
      </div>
    </div>
    <br>
    <br>
    <div id="border"><hr></div>
    
    <div class="row">
      <div class="col-md-12" id="academic">
        <h3 class="text-center">Details of Academic Record</h3>
          <p>Name : <b> <?php echo $std->Full_Name;?></b></p>
          <p class="float-lg-right">Student ID   :<b>  <?php echo $std->Registration_Number;?></b></p>  
      </div>
    </div>
    <div class="row"><!-- First Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- First Semester Result Start Here-->
        <p><b>First Semester</b></p>
        <p><b>Academic Year: {{$fsem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="100px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              
            </tr>
          </thead>

          <tbody>
            <?php $res = 0; $l1t1_creditsum = 0;?>
           @foreach($l1t1s as $mark)
           
            <tr>
              @if($mark->level =='l1t1')

              <td width="120px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res+= $credit*$point ?>
              <?php $l1t1_creditsum=$l1t1_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l1t1_gpa=$res/$l1t1_creditsum, 2, '.', '')}}</b></p> 
          </div>
      </div><!-- First Semester Result End Here-->
      
      <div class="col-md-6"><!-- Second  Semester Result  Start Here-->
        <p><b>Second Semester</b></p>
        <p><b>Academic Year: {{$ssem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <?php $res = 0; $l1t2_creditsum = 0;?>
           @foreach($l1t2s as $mark)
          
            <tr>
              @if($mark->level =='l1t2')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>

              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res = $res+($credit*$point) ?>
              <?php $l1t2_creditsum=$l1t2_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l1t2_gpa=$res/$l1t2_creditsum, 2, '.', '')}}</b></p> 
          </div>
      </div><!-- Second Semester Result End Here-->
    </div><!-- First Two Semester Result Row End  Here-->

    <div class="row"><!-- Second Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- Third Semester Result Start Here-->
        <p><b>Third Semester</b></p>
        <p><b>Academic Year: {{$thsem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              
            </tr>
          </thead>
           <tbody>
            <?php $res = 0; $l2t1_creditsum = 0;?>
           @foreach($l2t1s as $mark)
          
            <tr>
              @if($mark->level =='l2t1')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point ?>
               <?php $res = $res+($credit*$point) ?>
              <?php $l2t1_creditsum=$l2t1_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l2t1_gpa=$res/$l2t1_creditsum, 2, '.', '')}}</b></p> 
          </div>
      </div><!-- Third Semester Result End Here-->
      <div class="col-md-6"><!-- Fourth  Semester Result  Start Here-->
        <p><b>Fourth Semester</b></p>
        <p><b>Academic Year: {{$foursem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              
            </tr>
          </thead>
          <tbody>
             <?php $res = 0; $l2t2_creditsum = 0;?>
           @foreach($l2t2s as $mark)
          
            <tr>
              @if($mark->level =='l2t2')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point; ?>
               <?php $res = $res+($credit*$point); ?>
              <?php $l2t2_creditsum = $l2t2_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
    
              <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l2t2_gpa=$res/$l2t2_creditsum, 2, '.', '')}}</b></p>
          </div>
      </div><!-- Fourth Semester Result End Here-->
    </div><!-- Second Two Semester Result Row End  Here-->
    <div class="row">
      <div class="col-md-6">
        <p>Prepared by: </p> 
        <p>Checked by: </p> 
      </div>
      <div class="col-md-6">
        <br>
        <br>
        <div id="border"><hr></div>
        <h6 class="text-center">Controller of Examinations</h6>
      </div>
    </div>

     <p style="page-break-after: always;">&nbsp;</p>
      <p style="page-break-before: always;"></p>
        <div class="row" style="visibility:hidden;">
      <div class="col-md-6">
        <h4 style="text-align: right;">Bangladesh Army International University of Science & Technology
        </h4>
        <p style="text-align: right;">Cumilla, Bangladesh</p>
      </div>
      <div class="col-md-6">
        <img height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
                <div style="float:right;">
<p>Sponsored by</p>
<img align="center" style="margin-left: 30px;" height="40px;" width="40px;" src="{{asset('bdarmy.png')}}">
<p>Bangladesh Army</p>
          
        </div>
      </div>
    </div>
    <br>

    <div id="border"><hr></div>
   
     <div class="row">
      <div class="col-md-12" id="academic">
        <h3 class="text-center">Details of Academic Record</h3>
          <p>Name : <b> <?php echo $std->Full_Name;?></b></p>
          <p class="float-lg-right">Student ID   :<b>  <?php echo $std->Registration_Number;?></b></p>  
      </div>
    </div>
    <div class="row"><!-- Second Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- Third Semester Result Start Here-->
        <p><b>Fifth Semester</b></p>
        <p><b>Academic Year: {{$fivesem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              
            </tr>
          </thead>
          <tbody>
           <?php $res = 0; $l3t1_creditsum = 0;?>
           @foreach($l3t1s as $mark)
          
            <tr>
              @if($mark->level =='l3t1')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point ?>
               <?php $res = $res+($credit*$point) ?>
              <?php $l3t1_creditsum=$l3t1_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
         
              <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l3t1_gpa=$res/$l3t1_creditsum, 2, '.', '')}}</b></p> 
          </div>
      </div><!-- Third Semester Result End Here-->
      <div class="col-md-6"><!-- Fourth  Semester Result  Start Here-->
        <p><b>Sixth Semester</b></p>
        <p><b>Academic Year: {{$sixsem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              
            </tr>
          </thead>
          <tbody>
            <?php $res = 0; $l3t2_creditsum = 0;?>
           @foreach($l3t2s as $mark)
          
            <tr>
              @if($mark->level =='l3t2')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
             <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point ?>
               <?php $res = $res+($credit*$point) ?>
              <?php $l3t2_creditsum=$l3t2_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l3t2_gpa=$res/$l3t2_creditsum, 2, '.', '')}}</b></p>
          </div>
      </div><!-- Fourth Semester Result End Here-->
    </div><!-- Second Two Semester Result Row End  Here-->

    <div class="row"><!-- Second Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- Third Semester Result Start Here-->
        <p><b>Seventh Semester</b></p>
        <p><b>Academic Year: {{$sevensem}}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
           <?php $res = 0; $l4t1_creditsum = 0;?>
           @foreach($l4t1s as $mark)
          
            <tr>
              @if($mark->level =='l4t1')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
             <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point ?>
               <?php $res = $res+($credit*$point) ?>
              <?php $l4t1_creditsum=$l4t1_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
          <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l4t1_gpa=$res/$l4t1_creditsum, 2, '.', '')}}</b></p> 
          </div>
      </div><!-- Third Semester Result End Here-->
      <div class="col-md-6"><!-- Fourth  Semester Result  Start Here-->
        <p><b>Eighth Semester</b></p>
        <p><b>Academic Year: {{ $eightsem }}</b></p>
        <table class="table table-bordered" width="50%">
          <thead>
            <tr>
              <th width="120px;">Course Code</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
           <?php $res = 0; $l4t2_creditsum = 0;?>
           @foreach($l4t2s as $mark)
          
            <tr>
              @if($mark->level =='l4t2')
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              
             <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>

              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point ?>
               <?php $res = $res+($credit*$point) ?>
              <?php $l4t2_creditsum=$l4t2_creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <p>Grade Point Average (GPA) for this semester :<b> {{number_format((float)$l4t2_gpa=$res/$l4t2_creditsum, 2, '.', '')}}</b></p>
        @if($std->Program=='BBA' || $std->Program=='English'|| $std->Program=='LLB')
        <div class="row">
          <table class="table table-bordered" width="50%">
            <thead>
              <tr>
                <th width="120px;">Course Code</th>
                <th>Course Title</th>
                <th>Credit</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
                <?php $res = 0; $ac_creditsum = 0;?>
              @foreach($acs as $mark)
              <tr> 
                <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              
             <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>

              <td><b style="margin-left:15px;">{{$mark->grade_letter}}</b></td>
              <?php $point = $mark->grade_point ?>
               <?php $res = $res+($credit*$point) ?>
              <?php $ac_creditsum=$ac_creditsum+$credit;?>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
        <div id="grade">
              
            <?php 
$total_credit = $l1t1_creditsum+$l1t2_creditsum+$l2t1_creditsum+$l2t2_creditsum+$l3t1_creditsum+$l3t2_creditsum+$l4t1_creditsum+$l4t2_creditsum+$ac_creditsum;
            ?>
              <p><b>Total Credit Earned: {{$total_credit}}</b></p>
               <p><b>CGPA at the End of 8<sup>th</sup>  Semester : {{$total_cgpa}} </b></p>
          </div>
      </div><!-- Fourth Semester Result End Here-->
    </div><!-- Second Two Semester Result Row End  Here-->


    <div class="row">
      <div class="col-md-6">
        <p>Date Prepared: <?php echo date("d M Y");?></p>
        <p>Checked by: _____________</p>
      </div>
      
      <div class="col-md-6">
        <br>
        <br>
         <div id="border"><hr></div>
        <h6 class="text-center">Controller of Examinations</h6>
      </div>
    </div>
</div>

  <!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>