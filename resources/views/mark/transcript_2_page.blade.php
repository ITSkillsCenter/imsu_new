
<?php 
if($std->Program=='CSE'){
  $program = "Bachelor of Science in Computer Science & Engineering";
}else if($std->Program=='EEE'){
  $program = "Bachelor of Science in Electrical & Electronic Engineering";
}else if($std->Program=='CE'){
  $program="Bachelor of Science in Civil Engineering";
}else if($std->Program=='BBA'){
  $program="Bachelor of Business Administration";
}else if($std->Program=='LLB'){
  $program="Bachelor of Law";
}else if($std->Program=='English'){
  $program="Bachelor of Arts (Honours) in English";
}else{
    $program="Bachelor of Arts (Honours) in English";
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
    font-size: 14px;
  }
  #academic p{
    font-size: 16px;
    line-height:1;
  }
  #table_grade tr td{
    font-size: 14px;
    border: 1px solid black;
    border-top: 1px solid black !important;
  }
  .grade tr td{
    font-size: 16px;
    text-align:center;
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
  <br>
  <br>
  <!--#########  First Page Transcript Start Here with two semester result  #########-->
  <div class="container">
    <div class="row" style="visibility:hidden;">
      <div class="col-md-2">
        <img style="float:right;" height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
      </div>
      <div class="col-md-10">
          <h4 class="text-center">Bangladesh Army International University of Science and Technology
          </h4>
          <p class="text-center">Cumilla, Bangladesh</p>
        </div>
    </div>
    <div id="border"><hr></div>
    <div class="row">
      <div class="col-md-12" id="academic">
        <div style="display:block" >
            <h5 class="text-center">TRANSCRIPT OF ACADEMIC RECORD </h5> <span style="float:right;margin-top: -34px;">Transcript Number: TS-{{$serial_no}}</span>
        </div>
        
          <p>Name : <?php echo $std->Full_Name;?></p>
          <p>Student ID   : <?php echo $std->Registration_Number;?>  </p> 
          <?php $bdate = str_replace('/', '-',$std->Date_of_Birth) ?>
          <p>Date of Birth: <?php echo date("d M Y",strtotime($bdate));?></p>  
          <p>Degree Awarded: {{$program}}</p>
          @if($std->Program=='BBA')  
          <p>Major:  {{ $major }}</p> 
          @endif
          <p>Duration of the Program: {{$duration_program}}</p>   
          <p>Academic Years Attended:  {{ reset($semesters_1)->semester}} to 
            @if(count($semesters_3)>0)
            {{ end($semesters_3)->semester }}
            @else
            {{ end($semesters_2)->semester }}
            @endif
          </p>  
          <p>Date of Completion :  {{$complete_degree}}</p>  
          <p>Medium of Instruction: English </p>  
     <?php 
        
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
          <p>Required Credit for Graduation: {{$r_credit}}</p>  
  
          <p>Cumulative Grade Point Average (CGPA): {{$total_cgpa}} out of : 4.00</p>  
          <p>Date of Issue: <?php echo date("d M Y");?></p>  
      </div>
    </div>
    
    
<!--#########  First Page Transcript End Here  with two semester result #########-->
<!--#########  Second Page Transcript Start Here with four semester result #########-->

<div class="container" >
    <div class="row">
      <div class="col-md-12" id="academic">
        <h5 class="text-center">Details of Academic Record</h5> 
      </div>
    </div>
    
    <div class="row"><!-- Upto Six Semester Result Row Start Here-->
      @foreach($semesters_1 as $sem)
      <?php $index=$loop->index+1; ?>
      
      <div class="col-md-6"><!-- Upto Six Semester Result Start Here-->
   
        <p><b>
        @if($loop->index+1==1)
        {{ 'First Semester' }}
        @elseif(($loop->index+1)==2)
        {{ 'Second Semester' }}  
        @endif
        </b></p>
        <p><b>Academic Year: {{$sem->semester}}</b></p>
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
            <?php $res = 0; $l1t1_creditsum = 0; $refferd=0; $imp=0;$blog=0;?>
           @foreach($marks as $mark)
           
            <tr>
              @if($mark->semester ==$sem->semester)

              <td width="120px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res+= $credit*$point ?>
              <?php $l1t1_creditsum=$l1t1_creditsum+$credit;?>
              <?php if($mark->course_status =='R'){
                $refferd++;
              }?>
              <?php if($mark->course_status =='I'){
                $imp++;
              }?>
              <?php if($mark->course_status =='B'){
                $blog++;
              }?>
              
              @endif
            </tr>
            @endforeach
            @if($refferd>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='R')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with referred exam.
            </td>
            </tr>
            @endif
            @if($imp>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='I')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with improvement exam.
            </td>
            </tr>
            @endif
            @if($blog>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='B')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with backlog exam.
            </td>
            </tr>
            @endif
            <tr>
              <td colspan="2">
                  Grade Point Average (GPA)  : 
              </td>
              <td colspan="2" align="center">
                  <b> {{number_format((float)$l1t1_gpa=$res/$l1t1_creditsum, 2, '.', '')}}</b>
              </td>
            </tr>
            <tr>
                <td colspan="2">
                    Total Credit: 
                </td>
                <td colspan="2" align="center"><b>{{number_format((float)$l1t1_creditsum, 2, '.', '')}}</b></td>
              </tr>
          </tbody>
        </table>

       
      </div><!-- First Semester Result End Here-->
    
      
      @endforeach
      

</div>
<div class="row">
  <div class="col-md-6">
      <br>
      <br>
      <br>
      <br>
    
    <p>Prepared by: </p> 
    <p>Checked by: </p> 
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-4">
    <br>
    <br>
    <br>
    <br>
    
    <h6 class="text-center" style="border-top: 1px solid black;">Controller of Examinations</h6>
  </div>
  <div class="col-md-1"></div>
</div>
<!-- #########  Second Page Transcript End Here with four semester result #########-->

<!-- #########  Third Page Transcript Start Here with four semester result #########-->

@if(count($semesters_2)>0)
<div class="container page-break break" >
    <br>
    <br>
    <br>
    <br>
  <div class="row" style="visibility:hidden;">
    <div class="col-md-2">
      <img style="float:right;" height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
    </div>
    <div class="col-md-10">
        <h4 class="text-center">Bangladesh Army International University of Science and Technology
        </h4>
        <p class="text-center">Cumilla, Bangladesh</p>
     </div>
  </div>
    
    <div id="border"><hr></div>
    
    <div class="row">
      <div class="col-md-12" id="academic">
        <h5 class="text-center">Details of Academic Record</h5>
          <p>Name : <?php echo  $std->Full_Name ;?> </p>
          <p>Student ID   :  <?php echo $std->Registration_Number;?></p>  
      </div>
    </div>
    
    <div class="row">
      @foreach($semesters_2 as $sem)
      <?php $index=$loop->index+1; ?>
      
      <div class="col-md-6">
   
        <p><b>
        @if($loop->index+1==1)
        {{ 'Third Semester' }}
        @elseif(($loop->index+1)==2)
        {{ 'Fourth Semester' }}
        @elseif(($loop->index+1)==3)
        {{ 'Fifth Semester' }} 
        @elseif(($loop->index+1)==4)
        {{ 'Sixth Semester' }}   
        @endif
        </b></p>
        <p><b>Academic Year: {{$sem->semester}}</b></p>
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
            <?php $res = 0; $l1t1_creditsum = 0; $refferd=0; $imp=0;$blog=0;?>
           @foreach($marks as $mark)
           
            <tr>
              @if($mark->semester ==$sem->semester)

              <td width="120px;">{{$mark->course_code}}</td>
              <td> {{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res+= $credit*$point ?>
              <?php $l1t1_creditsum=$l1t1_creditsum+$credit;?>
              <?php if($mark->course_status =='R'){
                $refferd++;
              }?>
              <?php if($mark->course_status =='I'){
                $imp++;
              }?>
              <?php if($mark->course_status =='B'){
                $blog++;
              }?>
              
              @endif
            </tr>
            @endforeach
            @if($refferd>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='R')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with referred exam.
            </td>
            </tr>
            @endif
            @if($imp>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='I')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with improvement exam.
            </td>
            </tr>
            @endif
            @if($blog>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='B')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with backlog exam.
            </td>
            </tr>
            @endif
            <tr>
              <td colspan="2">
                  Grade Point Average (GPA)  : 
              </td>
              <td colspan="2" align="center">
                  <b> {{number_format((float)$l1t1_gpa=$res/$l1t1_creditsum, 2, '.', '')}}</b>
              </td>
            </tr>
            <tr>
                <td colspan="2">
                    Total Credit: 
                </td>
                <td colspan="2" align="center"><b>{{number_format((float)$l1t1_creditsum, 2, '.', '')}}</b></td>
              </tr>
          </tbody>
        </table>

       
      </div>
    
      
      @endforeach
</div>
<div class="row">
  <div class="col-md-6">
      <br>
      <br>
      
    <p>Prepared by: </p> 
    <p>Checked by: </p> 
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-4">
    <br>
    <br>
    <br>
    
    <h6 class="text-center" style="border-top: 1px solid black;">Controller of Examinations</h6>
  </div>
  <div class="col-md-1"></div>
</div>
</div>

@endif
<!-- #########  Third Page Transcript End Here with four semester result #########-->
@if(count($semesters_3)>0)
<div class="container" >
    <br>
    <br>
    <br>
    <br>
    
  <div class="row" style="visibility:hidden;">
    <div class="col-md-2">
      <img style="float:right;" height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
    </div>
    <div class="col-md-10">
        <h4 class="text-center">Bangladesh Army International University of Science and Technology
        </h4>
        <p class="text-center">Cumilla, Bangladesh</p>
      </div>
  </div>
    
    <div id="border"><hr></div>
    
    <div class="row">
      <div class="col-md-12" id="academic">
        <h5 class="text-center">Details of Academic Record</h5>
          <p>Name : <?php echo  $std->Full_Name ;?> </p>
          <p>Student ID   :  <?php echo $std->Registration_Number;?></p>  
      </div>
    </div>
    
    <div class="row">
      @foreach($semesters_3 as $sem)
      <?php $index=$loop->index+1; ?>
      
      <div class="col-md-6">
   
        <p><b>
        @if($loop->index+1==1)
        {{ 'Seventh Semester' }}
        @elseif(($loop->index+1)==2)
        {{ 'Eighth Semester' }}
        @elseif(($loop->index+1)==3)
        {{ 'Ninth Semester' }} 
        @elseif(($loop->index+1)==4)
        {{ 'Tenth Semester' }}   
        @endif
        </b></p>
        <p><b>Academic Year: {{$sem->semester}}</b></p>
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
            <?php $res = 0; $l1t1_creditsum = 0; $refferd=0; $imp=0;$blog=0;?>
           @foreach($marks as $mark)
           
            <tr>
              @if($mark->semester ==$sem->semester)

              <td width="120px;">{{$mark->course_code}}</td>
              <td >{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res+= $credit*$point ?>
              <?php $l1t1_creditsum=$l1t1_creditsum+$credit;?>
              <?php if($mark->course_status =='R'){
                $refferd++;
              }?>
              <?php if($mark->course_status =='I'){
                $imp++;
              }?>
              <?php if($mark->course_status =='B'){
                $blog++;
              }?>
              
              @endif
            </tr>
            @endforeach
            @if($refferd>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='R')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with referred exam.
            </td>
            </tr>
            @endif
            @if($imp>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='I')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with improvement exam.
            </td>
            </tr>
            @endif
            @if($blog>0)
            <tr> 
            <td colspan="4">
              @foreach($marks as $mark)
              @if($mark->semester ==$sem->semester)
                @if($mark->course_status =='B')
                  <b>{{$mark->course_code}}, </b>
                @endif
              @endif
              @endforeach
              passed with backlog exam.
            </td>
            </tr>
            @endif
            <tr>
              <td colspan="2">
                  Grade Point Average (GPA)  : 
              </td>
              <td colspan="2" align="center">
                  <b> {{number_format((float)$l1t1_gpa=$res/$l1t1_creditsum, 2, '.', '')}}</b>
              </td>
            </tr>
            <tr>
                <td colspan="2">
                    Total Credit: 
                </td>
                <td colspan="2" align="center"><b>{{number_format((float)$l1t1_creditsum, 2, '.', '')}}</b></td>
              </tr>
          </tbody>
        </table>

       
      </div><!-- Ten Semester Result End Here-->
    
      
      @endforeach
</div>

</div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-6">
          <br>
          <br>
            
          <p>Prepared by: </p> 
          <p>Checked by: </p> 
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <div id="grade"> 
                <p><b>Total Credit Earned: {{ $tcredit }}</b></p>
                 <p><b>CGPA at the End of  Semesters : {{ $total_cgpa }} </b></p>
          </div>
          <br>
          <br>
          <br>
          
          <h6 class="text-center" style="border-top: 1px solid black;">Controller of Examinations</h6>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="container page-break break">
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
          </div>
     </div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <br>
        
        <h5 style="margin:5px;"> Grading System:</h5>
        <br>
          <table class="table grade">
            <thead>
              <tr>
                <td>Numerical Markings</td>
                <td>Grade</td>
                <td>Grade Points</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>80% and above</td>
                <td>A+</td>
                <td>4.00</td>
              </tr>
              <tr>
                <td>75% to below 80%</td>
                <td>A</td>
                <td>3.75</td>
              </tr>
              <tr>
                <td>70% to below 75%</td>
                <td>A-</td>
                <td>3.50</td>
              </tr>
              <tr>
                <td>65% to below 70%</td>
                <td>B+</td>
                <td>3.25</td>
              </tr>
              <tr>
                <td>60% to below 65%</td>
                <td>B</td>
                <td>3.00</td>
              </tr>
              <tr>
                <td>55% to below 60%</td>
                <td>B-</td>
                <td>2.75</td>
              </tr>
              <tr>
                <td>50% to below 55%</td>
                <td>C+</td>
                <td>2.50</td>
              </tr>
              <tr>
                <td>45% to below 50%</td>
                <td>C</td>
                <td>2.25</td>
              </tr>
              <tr>
                <td>40% to below 45%</td>
                <td>D</td>
                <td>2.00</td>
              </tr>
              <tr>
                <td>Below 40% </td>
                <td>F</td>
                <td>0.00</td>
              </tr>
              <tr>
                <td>Incomplete </td>
                <td>I</td>
                <td>-</td>
              </tr>
              <tr>
                <td>Withdrawal </td>
                <td>W</td>
                <td>-</td>
              </tr>
              <tr>
                <td>Project/Thesis continuation </td>
                <td>X</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4" >
      Cumulative Grade Point Average CGPA= 
      </div>
      <div class="col-md-8" id="grade">
        <span>&Sigma;</span> (Number of Credits in a Course x Grade Point Earned in That Course)
        <div class="col-md-10"  style="border-top: 1px solid black;"></div>
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

  <!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>