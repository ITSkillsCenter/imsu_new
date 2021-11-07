@extends('admin_student.master')
@section('title')
Student||Attendance
@endsection
@section('main')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Attendance Report <li class="list-group-item "><b>{{$session->semester}}</b> || 
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
              <li class="breadcrumb-item active">Attendance Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                @foreach($courses as $c)
                  <a href="{{ url('/student-attendance',$c->course_id) }}"><li class="list-group-item ">{{$c->course_code}}-{{$c->course_name}}</li></a>
                @endforeach
            </ul> 
          </div>
        <div class="col-md-6">
            @if(count($attendances)>0)   
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-center text-dark">{{$co->course_code}}-{{$co->course_name}}</h3>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Present</th>
                            </tr>
                          </thead>
                
                          <tbody>
                            <?php $p = 0; $a=0?>
                           @foreach($attendances as $a)
                           
                            <tr>
                              <td width="100px;">{{$a->date}}</td>
                              
                              <td>
                                @if($a->present==1)
                                <span class="badge badge-pill badge-success">Yes</span>
                               <?php $p++;?>
                                @else
                              <span class="badge badge-pill badge-danger">No</span>
                              
                                @endif
                              </td>
                              
                             
                            </tr>
                            
                            @endforeach
                            <tr>
                              <td colspan="3"></td>
                              <td><b> </b></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
                      
              </div>
            </div>
            @else
            <center><p>No Result Found!!  </p></center>
            @endif
        </div>

        
        <div class="col-md-3">
            @if(count($attendances)>0)   
            <div class="card">
              <div class="card-header">
                <h2 class="card-title  text-center text-secondary">Summary Report of This Course</h2>
                <br>
                  <h3 class="card-title badge badge-pill badge-danger">Total Number of Class: {{$day = count($attendances)}}</h3><br><br>
                  <h3 class="card-title badge badge-pill badge-success">Total Attended in Class: {{$p}}</h3><br><br>
                  <h3 class=" card-title  badge badge-pill badge-warning">Total Percentage: <?php $percent=($p/$day)*100 ?> {{number_format((float)$percent,'2','.','')}}%</h3>
              </div>
            </div>
            @endif
        </div>
    </div>

    <section class="content">
        
      
      
      <div class="row">
        <div class="col-md-8">
       
        </div>

        

      </div>
    </section>

@endsection

