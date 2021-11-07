<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
  <title>Academic Record Transcript</title>
  <!-- Latest compiled and minified CSS -->


<link rel="stylesheet" href="{{asset('transcript/dist/css/bootstrap.css')}}" >
<style type="text/css" media="all">
  #border{
    width:100%;
    height: 2px;
    background-color: black;
  }
  #grade p{
    font-size: 12px;
  }
  #academic p{
    font-size: 14px;
  }
  tr td{
    font-size: 14px;
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

  <!--#########  First Page Transcript Start Here  #########-->
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4 style="text-align: right;">Bangladesh Army International University of Science & Technology
        </h4>
        <p style="text-align: right;">Cumilla,Bangladesh</p>
      </div>
      <div class="col-md-6">
        <img height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
      </div>
    </div>
    <div id="border"><hr></div>

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
    &nbsp;
    <div class="row">
      <div class="col-md-12" id="academic">
        <h3 class="text-center">TRANSCRIPT OF ACADEMIC RECORD</h3>
          <p>Name <span style="margin-left: 100px;">:</span> <b><?php echo $std->Full_Name;?></b></p>
          <p class="float-lg-right">Student ID   :<b><?php echo $std->Registration_Number;?>  </b></p> 
          <p>Date of Birth<span style="margin-left: 65px;">:</span> <?php echo $std->Date_of_Birth;?></p>  
          <p>Degree Awarded:Bachelor of Computer Science & Engineering </p>  
          <p>Duration of the Programme: 4 years</p>  
          <p>Academic Years Attended: 2015</p>  
          <p>Date of Completion of the degree: 2019</p>  
          <p>Cummulative Grade Point Average(CGPA): </p>  
          <p>Number of Students in the graduating class: </p>  
          <p>Rank of the student in the class: </p>  
          <p>Transcript Number: </p>  
          <p>Date of Issue: </p>  
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <p>Prepared by: </p> 
        <p>Checked by: </p> 
      </div>
      <div class="col-md-6">
        <div id="border"><hr></div>
&nbsp;
        <h6 class="text-center">Register</h6>
        <h6 class="text-center">Bangladesh Army International University of Science & Technology</h6>
        <h6 class="text-center">Cumilla,Bangladesh</h6>
      </div>
    </div>
    <div id="border"><hr></div>
    <h5 style="margin:5px;">* Grading System</h5>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6" id="grade">
          <p>A+:80% and above - 4 points/credit</p>
          <p>A-:70% to below 75% - 3.5 points/credit</p>
          <p>B:60% to below 65%- 3.00 points/credit</p>
          <p>C+:50% to below 55%- 2.5 points/credit</p>
          <p>D:40% to below 45%- 2.00 points/credit</p>
          <p>Graduate Thesis Grading- S: Satisfactory, U: Unsatisfactory</p>
        </div>
        <div class="col-md-6" id="grade">
          <p>A:75% to below 80%- 3.75 points/credit</p>
          <p>B+:65% to below 70% - 3.25 points/credit</p>
          <p>B-:55% to below 60%- 2.75 points/credit</p>
          <p>C:45% to below 50%- 2.25 points/credit</p>
          <p>D:below 40%(F means Fail)- 0 points/credit</p>
        </div>
    </div>
    <div class="row">
      <div class="col-md-3" id="grade"><br>
      <p>Grade Point Average(GPA)=</p></div>
      <div class="col-md-9" id="grade">
        <p>Summation of(Number of Credits in a Course x Grade Point Earnded in That Course)</p>
        <div id="border"><hr></div>
        <p>Total Number of Credits Earned</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" id="grade">
        <p>Maximum Attainable GPA : 4.00</p>
        <p>GPA Required for First Class with Honours = 3.75</p>
        <p>GPA Required for First Class = 3.00</p>
        <p>Minimum GPA Required to Award the Degree = 2.00</p>
        <br>
        <h5 class="text-center">CUMILLA CANTONMENT,CUMILLA,BANGLADESH</h5>
        <p class="text-center">Tel:+88 081-73910;Mob: 081-73920, 081-73930Ext- 0, 119; E-mail: info@baiust.edu.bd; website:www.baiust.edu.bd
</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"></div>
    </div>
  </div>
<!--#########  First Page Transcript End Here  #########-->
<!--#########  Second Page Transcript Start Here  #########-->
<div class="container page-break break" >
  <div class="row">
      <div class="col-md-6">
        <h4 style="text-align: right;">Bangladesh Army International University of Science & Technology
        </h4>
        <p style="text-align: right;">Cumilla,Bangladesh</p>
      </div>
      <div class="col-md-6">
        <img height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
      </div>
    </div>
    <div id="border"><hr></div>
    &nbsp;
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
        <p><b>Examination Held:</b>{{$fsem}}</p>
        <p><b>Academic Year:</b>{{$facy}}</p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              <th>Point</th>
            </tr>
          </thead>

          <tbody>
           @foreach($l1t1s as $mark)
           
            <tr>
              @if($mark->level =='l1t1')

              <td>{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{$credit = $mark->course_credit}}</td>
              <td>{{$mark->grade_letter}}</td>
              <td>{{$point = $mark->grade_point}}</td>
              <?php $res+= $credit*$point ?>
              <?php $creditsum=$creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : {{$gpa=$res/$creditsum}}</p>
              <p>Cummulative Grade Point Average(CGPA) : {{number_format((float)$gpa, 2, '.', '')}}</p>
          </div>
      </div><!-- First Semester Result End Here-->
      
      <div class="col-md-6"><!-- Second  Semester Result  Start Here-->
        <p><b>Second Semester</b></p>
        <p><b>Examination Held:{{$sesem}}</b></p>
        <p><b>Academic Year:{{$seacy}}</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              <th>Point</th>
            </tr>
          </thead>
          <tbody>
            <?php $res = 0; $creditsum = 0;?>
           @foreach($l1t2s as $mark)
          
            <tr>
              @if($mark->level =='l1t2')
              <td>{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{$credit = $mark->course_credit}}</td>
              <td>{{$mark->grade_letter}}</td>
              <td>{{$point = $mark->grade_point}}</td>
               <?php $res = $res+($credit*$point) ?>
              <?php $creditsum=$creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : {{$gpa=$res/$creditsum}}</p>
              <p>Cummulative Grade Point Average(CGPA) :{{number_format((float)$gpa, 2, '.', '')}}</p>
          </div>
      </div><!-- Second Semester Result End Here-->
    </div><!-- First Two Semester Result Row End  Here-->

    <div class="row"><!-- Second Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- Third Semester Result Start Here-->
        <p><b>Third Semester</b></p>
        <p><b>Examination Held:</b></p>
        <p><b>Academic Year:</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              <th>Point</th>
            </tr>
          </thead>
           <tbody>
            <?php $res = 0; $creditsum = 0;?>
           @foreach($l2t1s as $mark)
          
            <tr>
              @if($mark->level =='l2t1')
              <td>{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{$credit = $mark->course_credit}}</td>
              <td>{{$mark->grade_letter}}</td>
              <td>{{$point = $mark->grade_point}}</td>
               <?php $res = $res+($credit*$point) ?>
              <?php $creditsum=$creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : {{$gpa=$res/$creditsum}}</p>
              <p>Cummulative Grade Point Average(CGPA) : {{number_format((float)$gpa, 2, '.', '')}}</p>
          </div>
      </div><!-- Third Semester Result End Here-->
      <div class="col-md-6"><!-- Fourth  Semester Result  Start Here-->
        <p><b>Fourth Semester</b></p>
        <p><b>Examination Held:</b></p>
        <p><b>Academic Year:</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              <th>Point</th>
            </tr>
          </thead>
          <tbody>
             <?php $res = 0; $creditsum = 0;?>
           @foreach($l2t2s as $mark)
          
            <tr>
              @if($mark->level =='l2t2')
              <td>{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{$credit = $mark->course_credit}}</td>
              <td>{{$mark->grade_letter}}</td>
              <td>{{$point = $mark->grade_point}}</td>
               <?php $res = $res+($credit*$point) ?>
              <?php $creditsum=$creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : {{$gpa=$res/$creditsum}}</p>
              <p>Cummulative Grade Point Average(CGPA) : {{number_format((float)$gpa, 2, '.', '')}}</p>
          </div>
      </div><!-- Fourth Semester Result End Here-->
    </div><!-- Second Two Semester Result Row End  Here-->

     <p style="page-break-after: always;">&nbsp;</p>
      <p style="page-break-before: always;">&nbsp;</p>
        <div class="row">
      <div class="col-md-6">
        <h4 style="text-align: right;">Bangladesh Army International University of Science & Technology
        </h4>
        <p style="text-align: right;">Cumilla,Bangladesh</p>
      </div>
      <div class="col-md-6">
        <img height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
      </div>
    </div>
    <div id="border"><hr></div>
    &nbsp;
    <div class="row"><!-- Second Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- Third Semester Result Start Here-->
        <p><b>Fifth Semester</b></p>
        <p><b>Examination Held:</b></p>
        <p><b>Academic Year:</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              <th>Point</th>
            </tr>
          </thead>
          <tbody>
           <?php $res = 0; $creditsum = 0;?>
           @foreach($l3t1s as $mark)
          
            <tr>
              @if($mark->level =='l3t1')
              <td>{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{$credit = $mark->course_credit}}</td>
              <td>{{$mark->grade_letter}}</td>
              <td>{{$point = $mark->grade_point}}</td>
               <?php $res = $res+($credit*$point) ?>
              <?php $creditsum=$creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : {{$gpa=$res/$creditsum}}</p>
              <p>Cummulative Grade Point Average(CGPA) :{{number_format((float)$gpa, 2, '.', '')}}</p>
          </div>
      </div><!-- Third Semester Result End Here-->
      <div class="col-md-6"><!-- Fourth  Semester Result  Start Here-->
        <p><b>Sixth Semester</b></p>
        <p><b>Examination Held:</b></p>
        <p><b>Academic Year:</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <?php $res = 0; $creditsum = 0;?>
           @foreach($l3t2s as $mark)
          
            <tr>
              @if($mark->level =='l3t2')
              <td>{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{$credit = $mark->course_credit}}</td>
              <td>{{$mark->grade_letter}}</td>
              <td>{{$point = $mark->grade_point}}</td>
               <?php $res = $res+($credit*$point) ?>
              <?php $creditsum=$creditsum+$credit;?>
              @endif
            </tr>
            
            @endforeach
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : {{$gpa=$res/$creditsum}}</p>
              <p>Cummulative Grade Point Average(CGPA) : {{number_format((float)$gpa, 2, '.', '')}}</p>
          </div>
      </div><!-- Fourth Semester Result End Here-->
    </div><!-- Second Two Semester Result Row End  Here-->

    <div class="row"><!-- Second Two Semester Result Row Start Here-->
      <div class="col-md-6"><!-- Third Semester Result Start Here-->
        <p><b>Seventh Semester</b></p>
        <p><b>Examination Held:</b></p>
        <p><b>Academic Year:</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> CIT 5100</td>
              <td> Special Studies</td>
              <td> 2.00</td>
              <td> C</td>
            </tr>
            <tr>
              <td>CIT 5151</td>
              <td>web Based Instruction and E-learnig</td>
              <td>3.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>CIT 5153</td>
              <td>Statistical Packages</td>
              <td>3.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td> CIT5154</td>
              <td>Statistical Packages Lab</td>
              <td>1.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>ITS 0102</td>
              <td>Spoken Arabic I</td>
              <td>1.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>ITS 0107</td>
              <td>Islamiat</td>
              <td>2.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>ITS 5103</td>
              <td>Educational Psychology</td>
              <td>3.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>ITS 5119</td>
              <td>Administration & Supervision of Technical & Vocational Education</td>
              <td>3.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>ITS 5125</td>
              <td>Advanced Methods & Techniques of Teaching</td>
              <td>3.00</td>
              <td>A+</td>
            </tr>
            <tr>
              <td>ITS 5126</td>
              <td>Advanced Methods & Techniques of Teaching Lab</td>
              <td>1.00</td>
              <td>A+</td>
            </tr>
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : 3.83</p>
              <p>Cummulative Grade Point Average(CGPA) : 3.83</p>
          </div>
      </div><!-- Third Semester Result End Here-->
      <div class="col-md-6"><!-- Fourth  Semester Result  Start Here-->
        <p><b>Eight Semester</b></p>
        <p><b>Examination Held:</b></p>
        <p><b>Academic Year:</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> CIT 5200</td>
              <td> Special Studies</td>
              <td> 2.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> CIT 5251</td>
              <td> Information Security</td>
              <td> 3.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> CIT 5253</td>
              <td> Data Warehousing and Mining</td>
              <td> 3.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> ITS 0202</td>
              <td> Spoken Arabic II</td>
              <td> 1.00</td>
              <td> A</td>
            </tr>
            <tr>
              <td> ITS 0207</td>
              <td> Islamic History,Science and Culture</td>
              <td> 3.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> ITS 5213</td>
              <td> Curriculum Development in Technical & Vocational Education</td>
              <td> 3.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> ITS 5235</td>
              <td> Educational Measurement & Evaluation</td>
              <td> 3.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> ITS 5253</td>
              <td> Educational Research</td>
              <td> 3.00</td>
              <td> A-</td>
            </tr>
            <tr>
              <td> ITS 5258</td>
              <td> Observation & Practice Teaching</td>
              <td> 2.00</td>
              <td> A+</td>
            </tr>
            <tr>
              <td> ITS 5258</td>
              <td> Observation & Practice Teaching</td>
              <td> 2.00</td>
              <td> A+</td>
            </tr>
          </tbody>
        </table>
        <div id="grade">
              <p>Grade Point Average(GPA) for this semester : 3.83</p>
              <p>Cummulative Grade Point Average(CGPA) : 3.83</p>
          </div>
      </div><!-- Fourth Semester Result End Here-->
    </div><!-- Second Two Semester Result Row End  Here-->
    <div class="row">
      <div class="col-md-6">
        <p>Date Prepared: 07 November,2010</p>
        <p>Checked by: _____________</p>
      </div>
      <div class="col-md-6">
         <div id="border"><hr></div>
&nbsp;
        <h6 class="text-center">Register</h6>
        <h6 class="text-center">Bangladesh Army International University of Science & Technology</h6>
        <h6 class="text-center">Cumilla,Bangladesh</h6>
      </div>
    </div>
</div>

  <!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>