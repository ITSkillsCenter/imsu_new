@extends('admin_student.master')
@section('title')
Student||Admit Card
@endsection
@section('main')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Admit Card for <li class="list-group-item "><b>{{$session->semester}}</b> || 
              @if($session->reg_type==1)
              <b class="text-success">Regular/Term wise</b>
              @elseif($session->reg_type==2)
              <b class="text-danger">Term Repeat</b>
              @elseif($session->reg_type==3)
              <b>Retake</b>
              @elseif($session->reg_type==4)
              <b>Improvement</b>
              @endif
              || <b class="text-secondary">{{$session->levelTerm}}</b>
              </li></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admit Card Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
      
        <div class="col-md-6">
            <div class="card">
                <ul class="list-group">
                <h4 class="text-center text-info">  Registered Courses</h4>
                </ul>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($courses as $c)
                          <li class="list-group-item ">{{$c->course_code}}-{{$c->course_name}}</li>
                        @endforeach
                    </ul>
                </div> 
            </div>
        </div>
        <div class="col-md-6">
             
            <div class="card">
              <div class="card-header">
               
                <div class="card-body">
                    <ul class="list-group">
                    <h4 class="text-center text-info">Clearance Report</h4>
                    </ul>
                    
                   <table class="table">
                      <thead>
                        <tr>
                         <th width="50%">Clearance Name</th>
                         <th width="50%">Status/Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         <td>Hall/Hostel</td>
                         <td>
                           <?php
                           if($clearance->hostel ==1){
                             echo '<b class="badge badge-success"> Approved  </b>';
                           }elseif($clearance->hostel == 0){
                             echo '<b class="badge badge-danger"> Pending </b>';
                           }
                           ?>
                           </td>
                        </tr>
                        <tr>
                         
                        <tr>
                         <td>Department</td>
                         <td> <?php
                           if($clearance->department ==1){
                             echo '<b class="badge badge-success"> Approved  </b>';
                           }elseif($clearance->department == 0){
                             echo '<b class="badge badge-danger"> Pending </b>';
                           }
                           ?></td>
                        </tr>
                        <tr>
                         <td>Treasurer Branch</td>
                         <td> <?php
                           if($clearance->treasurer ==1){
                             echo '<b class="badge badge-success"> Approved  </b>';
                           }elseif($clearance->treasurer == 0){
                             echo '<b class="badge badge-danger"> Pending </b>';
                           }
                           ?>
                         <br>
                         <br>
                         <br>
                         Remarks:{{ $clearance->tb_remarks }}  
                         </td>
                        </tr>
                        <tr>
                          <td>Download</td>
                          @php 
                          $sid = Session::get('student_id');
                          $student_id=Crypt::encrypt($sid);
                          @endphp
                          <td>
                            @if(($clearance->treasurer ==1) && ($clearance->department ==1) && ($clearance->hostel==1))
                          <!--<a href="{{url('/student-admit',$student_id)}}"  class="btn btn-danger"><i class="fa fa-print" aria-hidden="true"></i>-->
                          <!--  PDF Download</a>-->
                            @endif

                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                      
              </div>
            </div>
            
        </div>
    </div>

    <section class="content">
        
      
      
      <div class="row">
        <div class="col-md-8">
       
        </div>

        

      </div>
    </section>

@endsection

