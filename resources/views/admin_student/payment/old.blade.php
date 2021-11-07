@extends('admin_student.master')
@section('title')
Student||Payment
@endsection
@section('main')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

      <div class="col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link  btn btn-outline-success" href="{{ URL::to('/payment-total') }}">Total Paid <span class="sr-only">(current)</span></a>&nbsp;&nbsp;


            </div>
          </div>
        </nav>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <ul class="list-group">
        <!-- @foreach($sessions as $session)
        <a href='{{url("/student-payment/$session->semester/$session->reg_type/$session->levelTerm")}}'>
          <li class="list-group-item "><b>{{$session->semester}}</b> ||
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
          </li>
        </a>
        @endforeach -->
      </ul>
    </div>
    <div class="col-md-12">
      <div class="row">

        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>

              <th>S/N</th>
              <th>Session</th>
              <th>Fee Name</th>
              <th>Amount</th>
              <th>Discount</th>
              <th>Status</th>
              <th>Due</th>
              <th>Pay</th>
            </tr>
          </thead>
          @php
          $total=0; $ct = 1;
          @endphp
          <tbody>
            @foreach ($fees as $item)
            <tr>

              <td>{{ $ct++ }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->fee_name }}</td>
              <td>₦{{ number_format($item->amount) }}</td>
              <td>{{ $item->discount }}</td>
              <td>{{ $item->status }}</td>
              <td>{{ $item->due_date }}</td>
              @php
              $total+=$item->amount;
              @endphp

              <td>
                @if($item->status !== paid)
                <a href="/student-payment/pay/{{base64_encode($item->id)}}" class="btn btn-info"> <i class="fas fa-money"></i> Pay</a>
                @endif
                <a href="#" class="btn btn-danger"><i class="fas fa-eye"></i> View</a>
              </td>
            </tr>
            @endforeach
            <tr>
              <td>Total</td>
              <td></td>
              <td>₦{{ number_format($total) }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

          </tbody>

        </table>
      </div>
     
    </div>
  </div>
</div>

@endsection