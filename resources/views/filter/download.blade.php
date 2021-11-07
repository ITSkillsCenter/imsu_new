<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Infomation</title>
    <link rel="stylesheet" href="{{asset('transcript/dist/css/bootstrap.css')}}" >
    <style>
    h3{
	font-family: monospace;
	font-size: 30px;
}
p{
	font-size: 25px;
	line-height: .75;
}
.table th, .table td {
    padding: .45rem!important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
        <div class="container">
                <div class="row">
                        <div class="col-2">
                       
                       <img style="float: right;" height="75px;" width="75px;" src="{{asset('assets/images/logo.png')}}" />
                      </div>
                        <div class="col-8 text-center" >
                          <h3>BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST)</h3>
                           <p>CUMILLA CANTONMENT</p>
                           <h2>Student Information<small> (Student Copy)</small></h2>
                        </div> 
                        <div class="col-2">
                         <img class="img-responsive img-thumbnail avatar-view" src="{{asset($student->Photo)}}"  heigth="100" width="100" title="{{$student->Full_Name}}" alt="{{$student->Full_Name}}">
                         </div> 
                
                </div>
                <div class="card">
                      <div class="card-body">
                           <h3>Personal Information:</h3>
                                <div class="row">
                                                <div class="col-6">
                                                        <table class="table table-striped">
                                                        <tr>
                                                                <td>Student:</td>         
                                                                <td>{{ $student->Full_Name }}</td>          
                                                         </tr>
                                                                <tr>
                                                                <td>Student Mobile:</td>        
                                                                 <td>{{ $student->Student_Mobile_Number }}</td>
                                                                </tr> 
                                                                <tr>
                                                                <td>Date of Birth:</td>        
                                                                <td>{{ $student->Date_of_Birth }}</td>   
                                                                </tr>
                                                                <tr>
                                                                <td>Gender:</td>        
                                                                 <td>{{ $student->Gender }}</td>
                                                                </tr>
                                                                <tr>
                                                                <td>Current Semester</td>
                                                                <td>{{ $student->Current_semester }}</td>
                                                                </tr>
                                                                </table>
                                                        </div>
                                                        <div class="col-6">
                                                                <table class="table table-striped">
                                                                <tr>
                                                                <td>Registration Number:</td>        
                                                                <td>{{ $student->Registration_Number }}</td>
                                                                </tr>
                                                                        <tr>
                                                                        <td>Department</td>        
                                                                        <td>{{ $student->Program }}</td>
                                                                        </tr>        
                                                                        <tr>
                                                                        <td>Batch</td>        
                                                                        <td>{{ $student->Batch }}</td>    
                                                                        </tr>
                                                                        <tr>
                                                                        <td>Religion</td>        
                                                                        <td>{{ $student->Religion }}</td>          
                                                                        </tr>
                                                                        <tr>
                                                                        <td>Nationality</td>
                                                                        <td>{{ $student->Nationality }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td>Student Email:</td>
                                                                        <td>{{ $student->Email_Address }}</td>
                                                                        </tr>
                                                                </table>
                                                        </div>     
                                </div>   
                      </div>  
                </div>
                
                <div class="card"> 
                 <h3 class="card-header">Guardian Information</h3>                                     
                <div class="card-body">
                <div class="row">
                        <div class="col-12">         
                                        <table class="table table-striped">                               
                                                        <tr>
                                                        <td>Father's Name:</td>
                                                        <td>  {{$student->Fathers_Name}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Father's Profession:</td>
                                                        <td> {{$student->Fathers_Profession}}</td>
                                                         </tr>
                                                        <tr>
                                                        <td>Mother's Name:</td>
                                                        <td> {{$student->Mothers_Name}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Mother's Profession:</td>
                                                        <td>{{$student->Mothers_Profession}}</td>
                                                         </tr>
                                                         <tr>
                                                        <td>Guardian Mobile Number:</td>
                                                        <td>{{$student->Guardian_Mobile_Number}}</td>
                                                         </tr>
                                                         @php $divi=DB::table('divisions')->where('id',$student->Division)->first();
                                                        $district=DB::table('districts')->where('id',$student->District)->first();

                                                        $upazila=DB::table('upazilas')->where('id',$student->Upazila)->first();
                                                        $union=DB::table('unions')->where('id',$student->Unions)->first();
                                                        @endphp
                                                        <tr>
                                                        <td>Address:</td>
                                                        <td> {{$student->Permanent_Address}}, Union:{{  $union->name}}, Upazilla:{{ $upazila->name }}, District:{{ $district->name }}, Division: {{ $divi->name }}</td>
                                                        </tr>
                                                      

                                                         
                                                         <tr>
                                                         <td> Resident:</td>
                                                         <td>{{$student->Major_1}}</td>
                                                         </tr>                              
                                                        </table>
                        </div>
                </div>
                </div>
                </div>
                @php	$check = DB::table('student_certificates')->where('student_id',$student->Registration_Number)->first();
									
                @endphp
                <div class="card">
                                <div class="card-body">
                                     <h3>Certificate Receiption Form:</h3>
                                        <div class="row">
                                        <div class="col-12">
                                                <table class="table table-striped">                               
                                                        <tr>
                                                                <th>SI.No.</th>
                                                                <th>Certificates/Documents</th>
                                                                <th>Received (Yes/No)</th>
                                                                <th>Signature</th>
                                                        </tr>
                                                        <tr>
                                                                <td>1</td>
                                                                <td>SSC Certificate, Orginal</td>
                                                                <td>{{ $check->ssc_c }}</td>
                                                                <td></td>
                                                         </tr>
                                                         <tr>
                                                                 <td>2</td>
                                                                 <td>SSC Mark Sheet, Orginal</td>
                                                                 <td>{{ $check->ssc_m }}</td>
                                                                 <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>3</td>
                                                                 <td>HSC Certificate, Orginal</td>
                                                                 <td>{{ $check->hsc_c }}</td>
                                                                 <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>4</td>
                                                                <td>HSC Mark Sheet, Orginal</td>
                                                                <td>{{ $check->hsc_m }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>5</td>
                                                                <td>Character Certificate from the Last Educational institution</td>
                                                                <td>{{ $check->cc }}</td>
                                                                 <td></td>
                                                        </tr>
                                                         <tr>
                                                                 <td>6</td>
                                                                 <td>Nationality / Birth Certificate from the Uunion Council Chairman</td>
                                                                 <td>{{ $check->bc }}</td>
                                                                 <td></td>
                                                         </tr>
                                                        <tr>
                                                                <td>7</td>
                                                                <td>Certificate and Participation in the War of Liberation for sons/daughters of FFs</td>
                                                                <td>{{ $check->ff }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>8</td>
                                                                <td>Character Certificate from the Circle Chiefs and DCs for tribal Candidates</td>
                                                                <td>{{ $check->tc }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>9</td>
                                                                <td>Medical Fitness Certificate : Urine (RE),Blood Grouping</td>
                                                                <td>{{ $check->mfc }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>10</td>
                                                                <td>Bond for Leaving the Course and the university before Completing the Course</td>
                                                                <td>{{ $check->blc }}</td>
                                                                <td></td>
                                                        </tr>
                                                 </table>

                                         </div>
                                          </div>
                                </div>
                </div>
        </div>
        <p style="page-break-after: always;">&nbsp;</p>
        <p style="page-break-before: always;">&nbsp;</p>
        <div class="container">
                <div class="row">
                        <div class="col-2">
                       
                       <img style="float: right;" height="75px;" width="75px;" src="{{asset('assets/images/logo.png')}}" />
                      </div>
                        <div class="col-8 text-center" >
                          <h3>BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST)</h3>
                           <p>CUMILLA CANTONMENT</p>
                           <h2>Student Information<small> (Office Copy)</small></h2>
                        </div> 
                        <div class="col-2">
                         <img class="img-responsive img-thumbnail avatar-view" src="{{asset($student->Photo)}}"  heigth="100" width="100" title="{{$student->Full_Name}}" alt="{{$student->Full_Name}}">
                         
                         
                         </div> 
                
                </div>
                <div class="card">
                      <div class="card-body">
                           <h3>Personal Information:</h3>
                                <div class="row">
                                                <div class="col-6">
                                                                <table class="table table-striped">
                                                                <tr>
                                                                <td>Student:</td>         
                                                                <td>{{ $student->Full_Name }}</td>          
                                                                </tr>
                                                                <tr>
                                                                <td>Student Mobile:</td>        
                                                                 <td>{{ $student->Student_Mobile_Number }}</td>
                                                                </tr> 
                                                                <tr>
                                                                <td>Date of Birth:</td>        
                                                                <td>{{ $student->Date_of_Birth }}</td>   
                                                                </tr>
                                                                <tr>
                                                                <td>Gender:</td>        
                                                                 <td>{{ $student->Gender }}</td>
                                                                </tr>
                                                                <tr>
                                                                <td>Current Semester</td>
                                                                <td>{{ $student->Current_semester }}</td>
                                                                </tr>
                                                                </table>
                                                        </div>
                                                        <div class="col-6">
                                                                <table class="table table-striped">
                                                                <tr>
                                                                <td>Registration Number:</td>        
                                                                <td>{{ $student->Registration_Number }}</td>
                                                                </tr>
                                                                        <tr>
                                                                        <td>Department</td>        
                                                                        <td>{{ $student->Program }}</td>
                                                                        </tr>        
                                                                        <tr>
                                                                        <td>Batch</td>        
                                                                        <td>{{ $student->Batch }}</td>    
                                                                        </tr>
                                                                        <tr>
                                                                        <td>Religion</td>        
                                                                        <td>{{ $student->Religion }}</td>          
                                                                        </tr>
                                                                        <tr>
                                                                        <td>Nationality</td>
                                                                        <td>{{ $student->Nationality }}</td>
                                                                        </tr> 
                                                                         <tr>
                                                                        <td>Student Email:</td>
                                                                        <td>{{ $student->Email_Address }}</td>
                                                                        </tr>
                                                                </table>
                                                        </div>     
                                </div>   
                      </div>  
                </div>
                
                <div class="card"> 
                 <h3 class="card-header">Guardian Information</h3>                                     
                <div class="card-body">
                <div class="row">
                        <div class="col-12">         
                                        <table class="table table-striped">                               
                                                        <tr>
                                                        <td>Father's Name:</td>
                                                        <td>  {{$student->Fathers_Name}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Father's Profession:</td>
                                                        <td> {{$student->Fathers_Profession}}</td>
                                                         </tr>
                                                        <tr>
                                                        <td>Mother's Name:</td>
                                                        <td> {{$student->Mothers_Name}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td>Mother's Profession:</td>
                                                        <td>{{$student->Mothers_Profession}}</td>
                                                         </tr>
                                                         <tr>
                                                        <td>Guardian Mobile Number:</td>
                                                        <td>{{$student->Guardian_Mobile_Number}}</td>
                                                         </tr>
                                                         @php $divi=DB::table('divisions')->where('id',$student->Division)->first();
                                                        $district=DB::table('districts')->where('id',$student->District)->first();

                                                        $upazila=DB::table('upazilas')->where('id',$student->Upazila)->first();
                                                        $union=DB::table('unions')->where('id',$student->Unions)->first();
                                                        @endphp
                                                        <tr>
                                                        <td>Address:</td>
                                                        <td> {{$student->Permanent_Address}}, Union:{{  $union->name}}, Upazilla:{{ $upazila->name }}, District:{{ $district->name }}, Division: {{ $divi->name }}</td>
                                                        </tr>
                                                      

                                                         
                                                         <tr>
                                                         <td> Resident:</td>
                                                         <td>{{$student->Major_1}}</td>
                                                         </tr>                              
                                                        </table>
                        </div>
                </div>
                </div>
                </div>
                @php	$check = DB::table('student_certificates')->where('student_id',$student->Registration_Number)->first();
									
                @endphp
                <div class="card">
                                <div class="card-body">
                                     <h3>Certificate Receiption Form:</h3>
                                        <div class="row">
                                        <div class="col-12">
                                                <table class="table table-striped">                               
                                                        <tr>
                                                                <th>SI.No.</th>
                                                                <th>Certificates/Documents</th>
                                                                <th>Received (Yes/No)</th>
                                                                <th>Signature</th>
                                                        </tr>
                                                        <tr>
                                                                <td>1</td>
                                                                <td>SSC Certificate, Orginal</td>
                                                                <td>{{ $check->ssc_c }}</td>
                                                                <td></td>
                                                         </tr>
                                                         <tr>
                                                                 <td>2</td>
                                                                 <td>SSC Mark Sheet, Orginal</td>
                                                                 <td>{{ $check->ssc_m }}</td>
                                                                 <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>3</td>
                                                                 <td>HSC Certificate, Orginal</td>
                                                                 <td>{{ $check->hsc_c }}</td>
                                                                 <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>4</td>
                                                                <td>HSC Mark Sheet, Orginal</td>
                                                                <td>{{ $check->hsc_m }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>5</td>
                                                                <td>Character Certificate from the Last Educational institution</td>
                                                                <td>{{ $check->cc }}</td>
                                                                 <td></td>
                                                        </tr>
                                                         <tr>
                                                                 <td>6</td>
                                                                 <td>Nationality / Birth Certificate from the Uunion Council Chairman</td>
                                                                 <td>{{ $check->bc }}</td>
                                                                 <td></td>
                                                         </tr>
                                                        <tr>
                                                                <td>7</td>
                                                                <td>Certificate and Participation in the War of Liberation for sons/daughters of FFs</td>
                                                                <td>{{ $check->ff }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>8</td>
                                                                <td>Character Certificate from the Circle Chiefs and DCs for tribal Candidates</td>
                                                                <td>{{ $check->tc }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>9</td>
                                                                <td>Medical Fitness Certificate : Urine (RE),Blood Grouping</td>
                                                                <td>{{ $check->mfc }}</td>
                                                                <td></td>
                                                        </tr>
                                                        <tr>
                                                                <td>10</td>
                                                                <td>Bond for Leaving the Course and the university before Completing the Course</td>
                                                                <td>{{ $check->blc }}</td>
                                                                <td></td>
                                                        </tr>
                                                 </table>

                                         </div>
                                          </div>
                                </div>
                </div>
        </div>
        <script>
        $(document).ready(function() {
                window.print();
        });
        
        </script>
</body>
</html>