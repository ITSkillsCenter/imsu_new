@extends('admin_student.master')
@section('title')
Student||Profile Update
@endsection
@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <form method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="row col-md-12">
              <div class="col-md-12">
                @include('homepage.flash_message')
              </div>
              <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header text-info ">Basic Information</h5>
                    <div class="card-body">
                      <table class="table table-stripe">
                            
                            <tbody>
                              <tr>
                                <th>Name:</th>
                                <td>  
                                    <p type="text" name="Full_Name">{{$student->last_name}} {{$student->first_name}} {{$student->middle_name}}</p></td>
                              </tr>
                              <tr>
                                <th>Religion:</th>
                                <td>
                                    <p type="text" name="Religion">{{$student->religion}}</p>
                                </td>
                              </tr>
                              <tr>
                                <th>Blood Group:</th>
                                <td>
                                    <p type="text" name="Blood_Group" >{{$student->blood_group}}</p>
                                </td>
                              </tr>
                              <tr>
                                <th>Nationality:</th>
                                <td>
                                    <p type="text" name="Nationality">{{$student->nationality}}</p>
                                </td>
                              </tr>
                              <tr>
                                <th>Date of Birth:(dd/mm/yyyy)</th>
                                <td>
                                    <p type="text" name="Date_of_Birth">{{$student->date_of_birth}}</p>
                                </td>
                              </tr>
                              <tr>
                                <th>Mobile:(01777777777)</th>
                                <td>
                                    <p type="text" name="Student_Mobile_Number">{{$student->Student_Mobile_Number}}</p>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Gender:</td>
                                 <td>
                                 <p type="text" name="Student_Mobile_Number">{{$student->gender}}</p>
<!-- 
                                   <select name="Gender" class="form-control">
                                     <option  @if($student->gender=="Male")
                                        selected value="{{$student->gender}}"  @endif>Male</option>
                                        <option  @if($student->gender=="Female")
                                            selected  value="{{$student->gender}}" @endif>Female</option>
                                   </select> -->
                                
                               </td>
                               <td></td>
                              </tr>
                              
                            </tbody>
                          </table>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Others Information</h5>
                    <div class="card-body ">
                      <table class="table">
                            
                            <tbody>
                              
                              <tr>
                                <th>Father's Name:</th>
                                <td>  
                                    <input type="text" name="fathers_name" class="form-control" value="{{$student->fathers_name}}">
                                </td>
                              </tr>
                              <tr>
                                <th>Father's Phone:</th>
                                <td> 
                                    <input type="text" name="fathers_phone" class="form-control" value="{{$student->fathers_phone}}">
                                </td>
                              </tr>
                              <tr>
                                <th>Father's Address:</th>
                                <td> 
                                    <input type="text" name="fathers_address" class="form-control" value="{{$student->fathers_address}}">
                                </td>
                              </tr>
                              <tr>
                                <th>Mother's Name:</th>
                                <td> 
                                    <input type="text" name="Mothers_Name" class="form-control" value="{{$student->mothers_name}}">
                                </td>
                              </tr>
                              <tr>
                                <th>Mother's phone:</th>
                                <td>
                                    <input type="text" name="mothers_phone" class="form-control" value="{{$student->mothers_phone}}">
                                </td>
                              </tr>
                              <tr>
                                <th>Mother's Address:</th>
                                <td>
                                    <input type="text" name="mothers_address" class="form-control" value="{{$student->mothers_address}}">
                                </td>
                              </tr>
                              <tr>
                                <th> Guardian Name:</th>
                                <td>
                                    <input type="text" name="guardians_name" class="form-control" value="{{$student->guardians_name}}">
                                </td>
                              </tr>
                              <tr>
                                <th> Guardian Address:</th>
                                <td>
                                    <input type="text" name="guardians_address" class="form-control" value="{{$student->guardians_address}}">
                                </td>
                              </tr>
                              <tr>
                                <th> Guardian Mobile No:</th>
                                <td><input type="text" name="guardians_phone" class="form-control" value="{{$student->guardians_phone}}"></td>
                              </tr>
                              <tr>
                                <th> Guardian Relationship:</th>
                                <td><input type="text" name="guardians_relationship" class="form-control" value="{{$student->guardians_relationship}}"></td>
                              </tr>
                              <!-- <tr>
                                <th> Present Address:</th>
                                <td>
                                    <textarea class="form-control" name="Present_Address">{{$student->Present_Address}}</textarea>
                                </td>
                              </tr> -->
                              <!-- <tr>
                                <th> Permanent Address:</th>
                                <td>
                                  <textarea class="form-control" name="Permanent_Address">{{$student->Permanent_Address}}</textarea>
                                </td>
                              </tr> -->
                              @if($sponsors_name !== null)
                              <tr>
                                <th> Sponsor's Name:</th>
                                <td>
                                    <textarea class="form-control" name="Present_Address">{{$student->sponsors_name}}</textarea>
                                </td>
                              </tr>
                              <tr>
                                <th> Sponsor's Address:</th>
                                <td>
                                    <textarea class="form-control" name="Present_Address">{{$student->sponsors_address}}</textarea>
                                </td>
                              </tr>
                              <tr>
                                <th> Sponsor's Phone:</th>
                                <td>
                                    <textarea class="form-control" name="Present_Address">{{$student->sponsors_phone}}</textarea>
                                </td>
                              </tr>
                              <tr>
                                <th> Sponsor's Relationship:</th>
                                <td>
                                    <textarea class="form-control" name="Present_Address">{{$student->sponsors_relationship}}</textarea>
                                </td>
                              </tr>
                              @endif
                              
                              
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-info text-center"><i class="fa fa-refresh"></i> Update</button>
                </div>
              </div>
              
            </div>
        </form>
    </section>
@endsection