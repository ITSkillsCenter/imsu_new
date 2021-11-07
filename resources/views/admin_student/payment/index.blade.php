@extends('admin_student.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Make Payment</h4>
            </div>
            <div class="card-body">
                @include('homepage.flash_message')
                <form action="/generate-invoice" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>{{ __('Revenue Heads') }}</label>
                                <select class="form-control" name="revenue_heads" required>
                                    <option value="">{{ __('Select one') }}</option>
                                    @if(count($fee_lists) > 0)
                                    @foreach($fee_lists as $f)
                                    <option value="{{$f->id}}">{{$f->fee_name}} - ₦{{$f->amount}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ __('Session') }}</label>
                                <select class="form-control" name="session" required>
                                    <option>{{ __('Select one') }}</option>
                                    @if(count($sessions) > 0)
                                    @foreach($sessions as $f)
                                    <option value="{{$f->id}}">{{$f->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div div class="col-md-3">
                            <div class="form-group">
                                <label style="width: 100%;">{{ __('.') }}</label>
                                <br>
                                <button type="submit" class="btn btn-md btn-primary" onclick="return confirm('You are about to generate an invoice, are you sure? This action is irreversible')"><i class="fa fa-check"></i> Generate Invoice </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payments</h4>
            </div>
            <div class="card-body">
                @include('homepage.flash_message')
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        @php
                        $total=0; $ct = 1;
                        @endphp
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Session</th>
                                <th>Fee Name</th>
                                <th>Amount</th>
                                <th>Discount (reason)</th>
                                <th>Status</th>
                                <th>Due</th>
                                <th>Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $item)
                            <tr>
                                <td>{{ $ct++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->fee_name }}</td>
                                <td>₦{{ number_format($item->amount) }}</td>
                                <td> {{ $item->discount ?? 'None' }} {{ $item->discount? '%' : '' }} <small>{{$item->reason ? ucwords($item->reason) : ''}}</small> </td>
                                <td>
                                    {{ $item->status }}
                                    {{ $item->receipt !== null && $item-> status == 'unpaid' ? '(Awaiting Approval)' : ''}}
                                </td>
                                <td>{{ $item->due_date }}</td>
                                <td>
                                    @if($item->status !== paid)
                                    <a href="/student-payment/pay/{{base64_encode($item->id)}}" class="btn btn-info"> <i class="fas fa-money"></i> Pay</a>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="{{$item->id}}">Upload Receipt</button>
                                    @endif
                                    <a href="/student-payment/view/{{base64_encode($item->id)}}" class="btn btn-danger"><i class="fas fa-eye"></i> View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Receipt:</label>
                        <input type="hidden" class="form-control" name="invoice_id" id="invoice_id" value="">
                        <input type="file" class="form-control" name="image">
                    </div>
                    @csrf
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

    });

    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('id')
        var modal = $(this)
        modal.find('#invoice_id').val(recipient)
    })
</script>
@endsection