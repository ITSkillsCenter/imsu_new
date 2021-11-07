@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Acceptance Fee Verification','Title'=>'Student'])
      
     <div class="row">


        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Students (Paid Acceptance):</p>
                                <h4 class="card-title">{{ count($students) ?? 0 }}</h4>
                                <a href="/admin/approve_acceptance/paid">View Paid List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Students (Awaiting Approval):</p>
                                <h4 class="card-title">{{ count($waiting) ?? 0 }}</h4>
                                <a href="/admin/approve_acceptance/waiting">View Waiting List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @include('homepage.flash_message')
            <div class="card">
                <div class="card-header">
                    <div class="card-title"></div>
                </div>
                <div class="card-body">
                    
                    <form method="post">
                        @csrf
                        @if($student_id=='waiting')
                        <div class="row">
                            <div class="col-md-12">
                           <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-md" id="checkall">Check all</button>
                            &nbsp;
                            <button type="button" class="btn btn-warning btn-md" id="uncheckall">Uncheck all</button>
                            &nbsp;
                            <button type="submit" class="btn btn-primary btn-md" id="approve_selected" disabled>Approve Selected</button>
                           </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            @if($student_id=='waiting')
                                            <th>Check</th>
                                            @endif
                                            <th>Full Name</th>
                                            <th>Registration Number</th>
                                            <th>Amount</th>
                                            <th>Paid Via</th>
                                            <th>Date Paid</th>
                                            <th>Receipt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student_container">
                                        @php if($student_id=='waiting') $use = $waiting
                                        @endphp
                                        @php if($student_id== 'paid') $use = $students
                                        @endphp
                                        @if(count($use)>0)
                                        @foreach($use as $student)
                                        <tr>
                                            @if($student->Email_Address !== null && $student_id=='waiting')
                                            <td>
                                                <input type="checkbox" class="stds" name="student_id[]" value="{{$student->student_id}}">
                                            </td>
                                            @endif

                                            <td>{{$student->first_name}} {{$student->last_name}} </td>
                                            <td>{{$student->registration_number}}</td>
                                            <td>{{$student->paid_via == null ? 'N'.number_format($student->amount) : 'N'.number_format($student->amount)}}</td>
                                            <td>{{$student->paid_via == null ? 'Web Portal': $student->paid_via }}</td>
                                            <td>{{$student->paid_via == null ? $student->created_at : $student->date}}</td>
                                            <td><img src="/uploads/images/receipts/{{$student->receipt}}" alt="" style="width:100px;"></td>
                                            <td>
                                            
                                            @if($student->status != paid  && $student->status != 'approved')
                                                <a class="btn btn-info btn-md" href="/admin/approve_acceptance/{{base64_encode($student->student_id)}}">Approve</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$student->id}}" data-name="{{$student->first_name}} {{$student->last_name}}">Reject</button>
                                            @endif

                                            @if($student->paid_via !== null)
                                            <a target="_blank" class="btn btn-primary btn-md" href="/uploads/images/receipts/{{$student->receipt}}">View Receipt</a>
                                            @endif
                                           
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" method="post" action="/admin/reject_acceptance">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reason for rejecting <span id="name"></span>'s acceptance receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="student_id" id="student_id">
        <textarea name="reason" id="" cols="30" rows="10" class="col-md-12"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<style>
 .btn{
  min-width: 133px;
}
    </style>
<script>
   $(document).ready(function() {
    $('#datatable-buttons').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    $('#exampleModalCenter').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name') // Extract info from data-* attributes
       
        
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        $('#name').html(name); 
        $('#student_id').val(id); 
        
    })

    $('.stds').change(function() {
        let total = $(".stds:checkbox:checked").length
        console.log(total)
        if (total > 0) {
            $('#approve_selected').prop('disabled', false)
        } else {
            $('#approve_selected').prop('disabled', true)
        }
    })

    $('#checkall').on('click', function() {
        $('#student_container').children().find('input[type="checkbox"]').prop('checked', true);
        let total = $(".stds:checkbox:checked").length
        console.log(total)
        if (total > 0) {
            $('#approve_selected').prop('disabled', false)
        } else {
            $('#approve_selected').prop('disabled', true)
        }
        // $('#approve_selected').prop('disabled', false)
    });
    $('#uncheckall').on('click', function() {
        $('#student_container').children().find('input[type="checkbox"]').prop('checked', false);
        $('#approve_selected').prop('disabled', true)
    });
</script>
@endsection
