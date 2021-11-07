@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Import Student','Title'=>'Student'])
      
     <div class="row">


        <div class="col-sm-12 col-md-12">
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
                                <p class="card-category">Total Students (Current ):</p>
                                <h4 class="card-title">{{ count($students) ?? 0 }}</h4>
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

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Check</th>
                                            <th>Full Name</th>
                                            <th>Matric Number</th>
                                            <th>Department</th>
                                            <th>Year of Admission</th>
                                            <th>State of Origin</th>
                                            <th>LGA</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student_container">
                                        @if(count($students)>0)
                                        @foreach($students as $student)
                                        <tr>
                                            <td>
                                                @if($student->Email_Address !== null && $student->status == 'saved')
                                                
                                                <input type="checkbox" class="stds" name="student_id[]" value="{{$student->id}}">
                                             
                                                @endif
                                            </td>
                                            <td>{{$student->first_name}} {{$student->last_name}} </td>
                                            <td>{{$student->matric_number}}</td>
                                            <td>{{$dept->name}}</td>
                                            <td>{{$student->Batch}}</td>
                                            <td>{{$student->state_of_origin}}</td>
                                            <td>{{$student->lga}}</td>
                                            <td>



                                            @if($student->status !== null)
                                                @if($student->status == 'approved' || $student->status == 'rejected')
                                                    <button type="button" class="btn btn-secondary">{{ucwords($student->status)}}</button>
                                                    <a class="btn btn-primary btn-md" href="/admin/view_student/{{base64_encode($student->id)}}">View</a>
                                                    <a class="btn btn-secondary" href="/admin/resend_email/{{$student->id}}">Resend Verification Email</a>
                                                @else
{{-- 
                                                <div class="btn-group">
                                                    <a class="btn btn-primary btn-md" href="/admin/view_student/{{base64_encode($student->id)}}">View</a>
                                                    <a class="btn btn-secondary" href="/admin/resend_email/{{$student->id}}">Resend Verification Email</a>
                                                    <a class="btn btn-info btn-md" href="/admin/approve/{{base64_encode($dept->id)}}/{{base64_encode($level)}}/{{base64_encode($student->id)}}">Approve</a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$student->id}}" data-name="{{$student->first_name}} {{$student->last_name}}">Not Approved</button>
                                                </div> --}}


                                                   @if($student->Email_Address !== null && $student->status == 'saved')
                                                    <div >
                                                        <a class="btn btn-primary btn-sm" href="/admin/view_student/{{base64_encode($student->id)}}">View</a>
                                                        <a class="btn btn-secondary" href="/admin/resend_email/{{$student->id}}">Resend Verification Email</a>
                                                        <a class="btn btn-info btn-sm" href="/admin/approve/{{base64_encode($dept->id)}}/{{base64_encode($level)}}/{{base64_encode($student->id)}}">Approve</a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$student->id}}" data-name="{{$student->first_name}} {{$student->last_name}}">Not Approved</button>
                                                    </div>
                                                   
                                                    @endif

                                                @endif
                                            @elseif($student->Email_Address !== null)
                                                 <a class="btn btn-secondary" href="/admin/resend_email/{{$student->id}}">Resend Verification Email</a>
                                            @else
                                                <p>Not registered</p>
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
    <form class="modal-content" method="post" action="/admin/reject_student">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reason for rejecting <span id="name"></span>'s application</h5>
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