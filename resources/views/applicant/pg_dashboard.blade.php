@extends('applicant.applicant_layout')
@section('content')

<div class="row">
    <!-- @if($pending_payments > 0)
    <div class="col-sm-12 col-lg-12">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-danger mr-3">
                    <i class="fa fa-money-check-alt"></i>
                </span>
                <div>
                    <h5 class="mb-1"><b><a href="/student-payment">You have {{$pending_payments}} pending payments</a></b></h5>
                </div>
            </div>
        </div>
    </div>
    @endif -->

    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-8 col-stats">
                        <div class="numbers">
                            <p class="card-category">Admission Status</p>
                            <h4 class="card-title">In progress</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-success card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-4">
                        <div class="icon-big text-center">
                            <i class="flaticon-analytics"></i>
                        </div>
                    </div>
                    <div class="col-8 col-stats">
                        <div class="numbers">
                            <p class="card-category">Admission Screening Result </p>
                            <h4 class="card-title">Not Available</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-info card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="icon-big text-center">
                            <i class="flaticon-interface-6"></i>
                        </div>
                    </div>
                    <a href="/pg-application-form" target="_blank" class="col-sm-8">
                        <div class="col-stats">
                            <div class="numbers">
                                <p class="card-category" style="font-size: 15px">• Application Form (Edit)</p>
                                <h4 class="card-title" style="font-size: 15px">• Download/Print</h4>
                            </div>
                        </div>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">News and updates</div>
            <div class="card-body">
                <div>
                    <b>•    You would be communicated by the university when the entrance exam is scheduled. </b>
                </div><br>
                <div>
                    <b>•	You can always log into your account using your application number and password to check news and updates regarding your application and admission from the admission portal </b>
                </div><br>
                <div>
                    <b>•	You can click <a target="_blank" href="/transcript-label">here</a> to download the transcript label  </b>
                </div><br>
                <div>
                    <b>•	You can click <a href="/docs/referee_form_sch_of_postgraduate.pdf" download="">here</a> to download the referee form</b>
                </div><br>
               
            </div>
        </div>
    </div>
</div>

@endsection