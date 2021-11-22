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
                    $status = Helper::get_payment_status_for_applicant($applicant->application_number);
                  @endphp
                  <span class="description-text badge badge-success">{{$status}}</span>
                  @if($status !== 'Paid')
                  <br><a id="clickme2" href="#myModal2" class="btn btn-primary trigger-btn" data-toggle="modal" data-backdrop="static">Click here to verify payment</a>
                  @endif
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"></h5>
                  <br>
                  <!-- @if($applicant->Current_status=='current')
                  <span class="description-text">Level Term: {{strtoupper($applicant->Current_semester)}}</span>
                  @endif -->
                </div>
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <!-- <div class="description-block">
                  <h5 class="description-header">Current Status</h5>
                  <span class="description-text badge badge-success">{{strtoupper($applicant->Current_status)}}</span>
                </div> -->
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->

      </div>
    </div><!-- Row  box end with Academic Information -->
    <div class="row col-md-12">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Basic Information</h5>
          <div class="card-body">
            <table class="table table-stripe">

              <tbody>
                <tr>
                  <th>Name:</th>
                  <td> {{$applicant->full_name ?? $applicant->first_name. ' ' . $applicant->last_name}}</td>
                </tr>
                <tr>
                  <th>Course:</th>
                  <td> {{ucwords($applicant->course)}}</td>
                </tr>
                <tr>
                  <th>State:</th>
                  <td>{{$applicant->state}}</td>
                </tr>
                <tr>
                  <th>LGA:</th>
                  <td>{{$applicant->lga}}</td>
                </tr>
                <tr>
                  <th>Date of Birth:</th>
                  <td>{{$applicant->date_of_birth}}</td>
                </tr>
                <tr>
                  <th>Mobile:</th>
                  <td>{{$applicant->phone_number}}</td>
                </tr>
                <tr>
                  <th>Mobile Alt:</th>
                  <td>{{$applicant->phone_number_alt}}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{$applicant->email}}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{$applicant->email_alt}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{$applicant->sex}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$applicant->address}}</td>
                </tr>
                <tr>
                    <th>Next of Kin</th>
                    <td>{{$applicant->next_of_kin}}</td>
                </tr>
                <tr>
                    <th>Next of Kin Phone</th>
                    <td>{{$applicant->next_of_kin_phone}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Grade</h5>
          <div class="card-body ">
            <table class="table">

              <tbody>
                <tr>
                  <th>Jamb Score:</th>
                  <td> {{$applicant->jamb_score}}</td>
                </tr>
                <!-- <tr>
                  <th>Father's Profession:</th>
                  <td> {{$applicant->Fathers_Profession}}</td>
                </tr> -->
                <tr>
                  <th>Jamb Score Breakdown:</th>
                  <td>
                    {{$applicant->jamb_subject1}} ({{$applicant->score1}}), {{$applicant->jamb_subject2}} ({{$applicant->score2}}),
                    {{$applicant->jamb_subject3}} ({{$applicant->score3}}), {{$applicant->jamb_subject4}} ({{$applicant->score4}})
                  </td>
                </tr>
                @php
                $exam1 = json_decode($applicant->exam_1);
                $olevel_1 = json_decode($applicant->olevel_1, true)

                @endphp
                <tr>
                  <th> Exam Type:</th>
                  <td>{{$applicant->type}}</td>
                </tr>

                <tr>
                  <th> School:</th>
                  <td>{{ucwords($exam1->school)}}</td>
                </tr>
                <tr>
                  <th> Exam Number:</th>
                  <td>{{$exam1->exam_number}}</td>
                </tr>
                <tr>
                  <th> Grade:</th>
                  <td>
                    @foreach($olevel_1 as $key => $value)
                    <span>{{$key}} - {{$value}},</span>
                    @endforeach
                  </td>
                </tr>
                @if($applicant->exam_2 !== null)
                    @php
                    $exam1 = json_decode($applicant->exam_2);
                    $olevel_1 = json_decode($applicant->olevel_1, true)
                    
                    @endphp
                    <tr>
                    <th> Exam 2 Type:</th>
                    <td>{{$applicant->type}}</td>
                    </tr>

                    <tr>
                    <th> School 2:</th>
                    <td>{{ucwords($exam1->school)}}</td>
                    </tr>
                    <tr>
                    <th> Exam Number 2:</th>
                    <td>{{$exam1->exam_number}}</td>
                    </tr>
                    <tr>
                    <th> Grade 2:</th>
                    <td>
                        @foreach($olevel_1 as $key => $value)
                        <span>{{$key}} - {{$value}},</span>
                        @endforeach
                    </td>
                    </tr>
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
                $.post('/api/update_application_payment', {
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