<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Registration Download</title>
  </head>
  <body>
      <div class="container">
          <div class="row" style="visibility:none;">
              <div class="col-2">
                <img style="float:right;" height="80px;" width="80px;" src="{{asset('assets/images/logo.png')}}" />
              </div>
              <div class="col-10">
                  <h4 class="text-center">Bangladesh Army International University of Science and Technology
                  </h4>
                  <p class="text-center">Cumilla, Bangladesh</p>
                </div>
            </div>
      </div>
      <div class="card-header">
            <h4 class="card-title text-center">Student's Registration Details of {{ $semester }} </h4>
          </div>
      @php
          $student= App\StudentInfo::where('Registration_Number',$student_id)->first();
      @endphp
      <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-4 ">
                        <img src="{{asset($student->Photo)}}" width="100px" height="100px" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <h6>
                            Name: {{$student->Full_Name}}</h6>
                        <p>Program: {{$student->Program}} </p>
                        <p>Student Mobile: {{$student->Student_Mobile_Number}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container x_content">
      <div class="card card-info">
          
          <div class="card-body">
              
            <table>
              <thead>
                <tr>
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Registration Type</th>
                 
                </tr>
              </thead>
              <tbody>
                  @php
                  $tc= 0;
                  @endphp
                  @foreach ($reg_students as $course)
                  <tr>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>  @if($course->reg_type==1)
                      <b>Regular/Term wise</b>
                      @elseif($course->reg_type==2)
                      <b>Term Repeat</b>
                      @elseif($course->reg_type==3)
                      <b>Referred</b>
                      @elseif($course->reg_type==4)
                      <b>Improvement</b>
                      @elseif($course->reg_type==5)
                      <b>Backlog</b>
                      @elseif($course->reg_type==6)
                      <b>Retake</b>
                      @endif</td>
                   
                    @php $tc= $tc+$course->credit; @endphp
                  </tr>
                  @endforeach
              </tbody>
            </table>
        
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <p class="text-center text-secondary">You have taken Total:   <?php echo $tc;?> credit  in this semester.</p>
        </div>
        </div>
        <!-- /.card -->

      </div>


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script>

    </script>
  </body>
</html>


