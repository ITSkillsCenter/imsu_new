@extends('admin_student.master')
@section('title')
Student||Result
@endsection
@section('main')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Result Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Result view semester wise</h3>
       
          
        <div class="row">
          
            <div class="col-md-3 col">
               <ul class="list-group">
                    @foreach($sessions as $session)  
                    <a href='{{url("/student-result/$session->semester")}}'><li class="list-group-item">{{$session->semester}} || 
                    
                    </li></a>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 mb-2">
                @if(count($marks)>0)
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
      <div class="table-responsive">
          <h1 class="text-center">Result of {{$sem}}</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <?php $res = 0; $l1t1_creditsum = 0;?>
           @foreach($marks as $mark)
           
            <tr>
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <td><b style="margin-left:15px;">{{ $mark->course_status }}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res+= $credit*$point ?>
              <?php $l1t1_creditsum=$l1t1_creditsum+$credit;?>
            </tr>
            
            @endforeach
            <tr>
              <td colspan="3">Grade Point Average (GPA) for this semester :</td>
              <td><b> {{number_format((float)$l1t1_gpa=$res/$l1t1_creditsum, 2, '.', '')}}</b></td>
            </tr>
          </tbody>
        </table>
      </div>
                
        </div>
      </div>
      @else
      <center><p>No Result Found Please Select Level Term</p></center>
      @endif
            </div>
            <div class="col-md-3 col">
               <ul class="list-group">
                <li class="list-group-item">P - passed with regular exam</li>
                <li class="list-group-item">R - passed with referred exam</li>
                <li class="list-group-item">B - passed with backlog exam</li>
                <li class="list-group-item">I - passed with improvement exam</li>
                <li class="list-group-item">F - fail</li>
                </ul>
            </div>
          </div>
       
        </div>
      </div>
      <!-- /.card -->
     

@endsection

