@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'ID Card Management','Title'=>'ID Card'])
      
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
                    
                    <form method="post" action="/admin/view-id-management-bulk">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                           <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-md" id="checkall">Check all</button>
                            &nbsp;
                            <button type="button" class="btn btn-warning btn-md" id="uncheckall">Uncheck all</button>
                            &nbsp;
                            <button type="submit" class="btn btn-primary btn-md" id="approve_selected" disabled>Generate ID card</button>
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
                                            <th>Faculty</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student_container">
                                        @if(count($staffs)>0)
                                        @foreach($staffs as $student)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="stds" name="student_id[]" value="{{$student->id}}">
                                            </td>
                                            <td>{{$student->name}} </td>
                                            <td>{{$student->fs}}</td>
                                            <td>{{$student->dept}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-md" href="/admin/view_staff_id/{{base64_encode($student->id)}}">View</a>
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