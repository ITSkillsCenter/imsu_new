@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Generate Matric Number','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Student Filter List > </h4>
                </div>
                <form method="post" action="{{route('student.matric.gen')}}">
                    @csrf
                    {{-- @method('PATCH') --}}
                <div class="card-header btn-group">
                   @if (count($studentsFilter)>0)
                   <button class="btn btn-info" type="button" id="checkall">check all</button>
                   &nbsp;
                   <button class="btn btn-secondary" type="button" id="uncheckall">uncheck all</button>
                       &nbsp;
                   <button type="submit" class="btn btn-primary btn-md" id="approve_selected" disabled>Generate Matric Number</button>  
                   @endif
                    &nbsp;
                    <a href="{{url('admin/matric-number')}}" class="btn btn-warning btn-md"  disabled>Go Back</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="student-datatables" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Check</th>
                                    <th>Full Name</th>
                                    <th>Matric Number</th>
                                    <th>Department</th>
                                    <th>Year of Admission</th>
                                    <th>State of Origin</th>
                                    <th>LGA</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            
                            <tbody id="student_container">
                               @if(count($studentsFilter)>0)
                                @foreach($studentsFilter as $student)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="stds" name="students_id[]" value="{{$student->id}}">
                                        <input type="hidden"  name="year" value="{{$student->Batch}}">
                                    </td>
                                    <td>{{$student->first_name}} {{$student->last_name}} </td>
                                    <td>{{$student->matric_number}}</td>
                                    <td>{{$student->department->name}}</td>
                                    <td>{{$student->Batch}}</td>
                                    <td>{{$student->state_of_origin}}</td>
                                    <td>{{$student->lga}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/admin/matric-num/{{base64_encode($student->id)}}/{{base64_encode($student->Batch)}}">Generate</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <div class="alert alert-info alert-block flash">
                                    {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
                                    <strong>No Student Record Found</strong>
                                </div>
                            </tbody>
                                @endif
                            
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
         
        </div>
    </div>
</div>


@endsection

@section('extrascript')
<script>

    
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