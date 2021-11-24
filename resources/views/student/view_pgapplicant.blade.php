@extends('layouts.master')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- {{-- <a href="{{ URL::to('/profile-update') }}" class="btn btn-md btn-outline-info"><i class="fa fa-refresh"></i> Update Profile</a> --}} -->
        </div>
        <div class="col-sm-6">
         
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- Row  box -->
    <div class="row col-md-12">
      <div class="col-md-12">

        <a class="btn btn-primary" href="javascript:history.go(-1)">Back</a>
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white">
            <h3 class="widget-user-username">{{strtoupper($applicant->Full_Name)}}</h3>
            <h3 class="widget-user-username">{{strtoupper($applicant->Registration_Number)}}</h3>
            <h5 class="widget-user-desc">Department of {{strtoupper($applicant->Program)}}</h5>
          </div>
          <div class="widget-user-image">
            <!-- <img class="img-circle" src="/profile_images/{{$applicant->Photo}}" heigth="200px" width="200px" alt="User Avatar"> -->
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">Payment Status</h5>
                  @php 
                    $status = Helper::get_payment_status_for_pgapplicant($applicant->application_number);
                  @endphp
                  <span class="description-text badge badge-success">{{$status}}</span>
                  @if($status !== 'Paid')
                  <br><a id="clickme2" href="#myModal2" class="btn btn-primary trigger-btn" data-toggle="modal" data-backdrop="static">Click here to verify payment</a>
                  @endif
                </div>
              </div>
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"></h5>
                  <br>
                </div>
              </div>
              <div class="col-sm-4">
               
              </div>
            </div>
          </div>
        </div>

      </div>
    </div><!-- Row  box end with Academic Information -->
    <div class="row col-md-12">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Basic Information</h5>
          <div class="card-body">
            <table class="table table-stripe">
                @php
                    $nok = json_decode($applicant->next_of_kin, true);
                   
                @endphp
              <tbody>
                <tr>
                  <th>Name:</th>
                  <td> {{$applicant->full_name ?? $applicant->first_name. ' ' . $applicant->last_name}}</td>
                </tr>
                
                <tr>
                  <th>Date of Birth:</th>
                  <td>{{$applicant->dob}}</td>
                </tr>
                <tr>
                  <th>Mobile:</th>
                  <td>{{$applicant->phone}}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{$applicant->email}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{$applicant->gender}}</td>
                </tr>
                <tr>
                  <th>Country of Origin:</th>
                  <td>{{$applicant->country_of_origin}}</td>
                </tr>
                <tr>
                  <th>State of Origin:</th>
                  <td>{{$applicant->state_of_origin}}</td>
                </tr>
                <tr>
                  <th>LGA of Origin:</th>
                  <td>{{$applicant->lga_of_origin}}</td>
                </tr>
                <tr>
                  <th>Country of Residence:</th>
                  <td>{{$applicant->country_of_residence}}</td>
                </tr>
                <tr>
                  <th>State of Residence:</th>
                  <td>{{$applicant->state_of_residence}}</td>
                </tr>
                <tr>
                  <th>LGA of Residence:</th>
                  <td>{{$applicant->lga_of_residence}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$applicant->location_of_residence}}</td>
                </tr>
                <tr>
                    <th>Disabilities</th>
                    <td>{{$applicant->disability}}</td>
                </tr>
                <tr>
                    <th>Funding</th>
                    <td>{{$applicant->funding}}</td>
                </tr>
                <tr>
                    <th>Funding Type</th>
                    <td>{{$applicant->funding_type}}</td>
                </tr>
                <tr>
                    <th>Next of Kin Name</th>
                    <td>{{$nok['name']}}</td>
                </tr>
                <tr>
                    <th>Next of Kin Phone</th>
                    <td>{{$nok['phone']}}</td>
                </tr>
                <tr>
                    <th>Next of Kin Email</th>
                    <td>{{$nok['email']}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <h5 class="card-header">Employment</h5>
          <div class="card-body ">
            <table class="table">
                @php
                    $emp = json_decode($applicant->employment, true);
                @endphp
              <tbody>
                <tr>
                    <th>Name of Employer</th>
                    <td>{{$emp['name']}}</td>
                </tr>
                <tr>
                    <th>Address of Employer</th>
                    <td>{{$emp['address']}}</td>
                </tr>
                <tr>
                    <th>Phone of Employer</th>
                    <td>{{$emp['phone']}}</td>
                </tr>
                <tr>
                    <th>Duration of Employment</th>
                    <td>{{$emp['duration']}}</td>
                </tr>
                <tr>
                    <th>Designation of Employment</th>
                    <td>{{$emp['designation']}}</td>
                </tr>
                <tr>
                    <th>Key Responsibilities</th>
                    <td>{{$emp['responsibilities']}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Program Details</h5>
          <div class="card-body ">
            <table class="table">

              <tbody>
                <tr>
                  <th>Faculty:</th>
                  <td> {{Helper::get_faculty($applicant->faculty_id)->name}}</td>
                </tr>
                <tr>
                  <th>Department:</th>
                  <td>
                    {{Helper::get_department($applicant->dept_id)->name}}
                  </td>
                </tr>
                
                <tr>
                  <th> Program:</th>
                  <td>{{Helper::get_programme($applicant->programme_id)->name}}</td>
                </tr>

                <tr>
                  <th> Specialization:</th>
                  <td>{{Helper::get_specialization($applicant->specialization_id)->name}}</td>
                </tr>

                <tr>
                  <th> Qualification:</th>
                  <td>{{$applicant->qualification}}</td>
                </tr>
                <tr>
                  <th> Study Type:</th>
                  <td>{{ucfirst($applicant->study_type)}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <h5 class="card-header">Previous Education</h5>
          <div class="card-body ">
            <table class="table">
                @php
                    $prev_edu = json_decode($applicant->previous_education, true);
                    $employment = json_decode($applicant->employment, true);
                    $ct = 1;
                @endphp
              <tbody>
                @if(count($prev_edu) > 0)
                @foreach($prev_edu as $single)
                <tr>
                  <td>School {{$ct++}}:</td>
                </tr>
                <tr>
                  <th>Name of School:</th>
                  <td> {{$single['name']}}</td>
                </tr>
                <tr>
                  <th>Programme Studied:</th>
                  <td> {{$single['programme_studied']}}</td>
                </tr>
                <tr>
                  <th>Qualification:</th>
                  <td> {{$single['qualification']}}</td>
                </tr>
                <tr>
                  <th>Year:</th>
                  <td> {{$single['grade_achieved']}}</td>
                </tr>
                <tr>
                  <th>Duration Of Studies:</th>
                  <td> {{$single['duration_of_studies']}}</td>
                </tr>
                <tr>
                  <th>Date Of Award:</th>
                  <td> {{$single['date_of_award']}}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <h5 class="card-header">Olevel</h5>
          <div class="card-body ">
            <table class="table">
                @php
                    $olevel = json_decode($applicant->olevel, true);
                    $ct = 1;
                @endphp
              <tbody>
                @if(count($olevel) > 0)
                @foreach($olevel as $single)
                <tr>
                  <td>O'level Exam {{$ct++}}</td>
                </tr>
                <tr>
                  <th>Name of School:</th>
                  <td> {{$single['school']}}</td>
                </tr>
                <tr>
                  <th>Exam Type:</th>
                  <td> {{$single['exam_type']}}</td>
                </tr>
                <tr>
                  <th>Exam Number:</th>
                  <td> {{$single['exam_number']}}</td>
                </tr>
                <tr>
                  <th>Year:</th>
                  <td> {{$single['year']}}</td>
                </tr>
                <tr>
                  <th>Subjects and Score:</th>
                  <td>
                      @if(count($single['exams']) > 0) 
                      @foreach($single['exams']['subject'] as $key => $value)
                        {{$value}} ({{$single['exams']['grade'][$key]}}), 
                      @endforeach
                      @endif
                    </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h3>Verify Payment</h3>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="full_name" value="{{$applicant->full_name ?? $applicant->first_name. ' ' . $applicant->last_name}}">
                    <input type="hidden" id="phone" value="{{$applicant->phone_number}}">
                    <input class="form-control" style="padding: 10px;" type="text" id="verify_rrr" placeholder="Type your RRR number here"> <br>
                    <button class="btn btn-success" id="check_pay_status">Verify</button><br><br>
                </div>
            </div>
        </div>
    </div>

    <a style="display: none;" id="suc_clickme" href="#success_modal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
    <a style="display: none;" id="err_clickme" href="#error_modal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
    
    <div id="success_modal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="fa fa-check">&#xE876;</i>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <h4>Succes!</h4>
                    <p>Payment Status Updated!</p>
                    <a class="btn btn-success" href="/admin/view-applicant/{{$applicant->application_number}}">Continue</a>
                </div>
            </div>
        </div>
    </div>
    <div id="error_modal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <h4>Error!</h4>
                    <p style="font-size: 14px;">Payment hasn't been made for this RRR</p>
                    <a class="btn btn-success" href="/admin/view-applicant/{{$applicant->application_number}}">Finish</a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <a style="display: none;" id="clickme" href="#myModal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>

    
  <script>
    $('#check_pay_status').click(function() {
        $(this).html('Loading...')
        let rrr = $('#verify_rrr').val()
        // alert(rrr)
        var settings = {
            "url": "https://imorms.ng/api/v1/college-requery/27/" + rrr,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Cookie": "ci_session=m33j75ft4lhpupt90cvder4p2doufhfo"
            },
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(settings).done(function(response) {
            $('#check_pay_status').html('Done')
            console.log(response)
            if (response.data.status == 'PAID') {
                let application_number = $('#client_ref').val()
                let name = $('#full_name').val()
                let phone = $('#phone').val()
                let amount = $('#amount').val()
                $.post('/api/update_pgapplication_payment', {
                    response,
                    application_number,
                    name,
                    phone,
                    amount
                }).done(function(data) {
                    if (data.body == "success") {
                        $('#suc_clickme').click()
                    } else {
                        $('#err_clickme').click()
                    }
                })
            } else {
                $('#err_clickme').click()
            }
        });
    })
  </script>
@endsection