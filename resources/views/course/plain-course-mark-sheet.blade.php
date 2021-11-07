@extends('layouts.master')


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Course Sheet','Title'=>'Sheet'])
        <div class="row" id="printableArea">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
<h4 class="card-title">All User Information</h4>
</div> --}}
                    <div class="card-header pt-4 pb-0">
                        
                        <div class=" align-items-center text-center p-0">
                            <div class="pull-left">
                                <img src="/assets/images/imsu-logo2.png" alt="" srcset="">
                            </div>

                            <div>
                                <h1 style="color: #08602c; font-weight:900;">IMO STATE UNIVERSITY, OWERRI</h1>
                           <div style="color: black;">WWW.IMSU.EDU.NG</div>
                           <h3 style="font-weight:900; padding-top:10px; padding-bottom:10px; color:white;background: rgb(255,255,255);
                           background: linear-gradient(90deg, rgba(255,255,255,1) 13%, rgba(129,52,102,1) 37%, rgba(125,47,98,1) 51%, rgba(134,61,108,1) 65%, rgba(255,255,255,1) 91%);">COURSE MARK SHEET</h3>
                        
                            </div>
                           
                    </div>
                    </div>
                    <div class="card-header" style="padding:0px;">
                        <div class=" align-items-center p-3 text-uppercase text-center">
                            <span>
                                <span class="text--green">Faculty:</span> 
                                <span class="text--purple">{{$course->faculty->name}}</span> 
                            </span>

                           <span> 
                               <span class="text--green">Department:</span> 
                               <span class="text--purple">
                                {{$course->department->name}}
                               </span>
                            </span>
                            <br>
                           <span> 
                               <span class="text--green">Course Title:</span> 
                                <span class="text--purple">
                                    {{$course->course_name}}
                                </span>
                            </span>
                           <span>
                                <span class="text--green">Course Code:</span>
                                <span class="text--purple"> {{$course->course_code}}</span>  
                            </span>

                            <br>

                            <span>
                                <span class="text--green">Credit Unit:</span>
                                <span class="text--purple"> {{$course->unit}}</span>  
                            </span>

                            <span>
                                <span class="text--green">Session:</span>
                                <span class="text--purple">{{\Helper::get_current_semester()}}</span>  
                            </span>
                            <br>
                            <span>
                                <span class="text--green">Semester:</span>
                                <span class="text--purple">{{$course->semester}}</span>  
                            </span>

                            <span>
                                <span class="text--green">Level:</span>
                                <span class="text--purple">{{$course->level}}</span>  
                            </span>
                           
                        </div>
                    </div>
                   
                    <div class="card-body text-uppercase" >
                        <div class="table-responsive">
                            {{-- <table id="basic-datatables" class="display table table-striped table-hover" > --}}
                            <table id="datatable-user" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Mat Number</th>
                                        <th>Students Name</th>
                                        <th>Exam
                                            Attendance</th>
                                        <th>Assessment
                                            Score  
                                            </th>
                                        <th>Exam score</th>
                                        <th>Total score </th>
                                        <th>Grade</th>
                                        <th>Comment </th>
                                    </tr>
                                </thead>

                        
                                @forelse ($course->coursesStudents as $key => $coursesStudent)
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{$coursesStudent->studentInfo->matric_number}}</td>
                                        <td>{{$coursesStudent->studentInfo->full_name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    
                                    </tr>
                                @empty
                                    <div class="text-center"> <h3>No student registered</h3> </div>
                                @endforelse
                                    
                               
                                  
                            
                                                      
                            </table>
                        </div>

                         <div class="pull-left" style="width: 48%; font-weight:1000;">
                            <div class="  p-3" style="border: 2px solid rgba(129,52,102,1); height:100px;">
                                <div class="row">
                                    <div class="col-md-4">HOD Name</div>
                                    <div class="col-md-4">SIGN</div>
                                    <div class="col-md-4">DATE</div>
                                </div>
                              
                            </div>
                        </div>

                        <div class="pull-right" style="width: 48%; font-weight:1000;">
                            <div class="  p-3" style="border: 2px solid rgba(129,52,102,1); height:100px;">
                                <div class="row">
                                    <div class="col-md-4">Lecturer Name</div>
                                    <div class="col-md-4">SIGN</div>
                                    <div class="col-md-4">DATE</div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                       
                </div>
            </div>

           
        </div>
        <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print" />


    </div>
@endsection

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>


<style>
    .table {
  border: 1px solid black;
}

.table thead th {
  border-top: 1px solid #000!important;
  border-bottom: 1px solid #000!important;
  border-left: 1px solid #000;
  border-right: 1px solid #000;
}

.table td {
  border-left: 1px solid #000;
  border-right: 1px solid #000;
  border-top: none!important;
}

.text--green{
        color: #08602c !important;
        font-weight: 1000;
    }

    .text--purple{
        color: rgba(129,52,102,1) !important;
        font-weight: 1000;

    }
</style>

