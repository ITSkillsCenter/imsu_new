@extends('layouts.master',['title'=>'Carry Over'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'All Courses','Title'=>'Course'])
      <div class="row">
        <div class="col-md-12">
          <div class="card">
           
           
            <div class="card-body">
              <div class="table-responsive">
                @if(count($departments)>0)
                  <div class="btn-group">
                  <form id="myform" method="post">
                    @csrf
                    <label>Select Department to View Carry over applicants</label>
                    <select id="department_course" name="dept" class="form-control">
                      <option>--Select Department--</option>
                      @foreach ($departments as $d)
                       <option {{$dept==$d->id ? 'selected' : ''}} value="{{$d->id}}" class="btn btn-info">{{$d->name}}</option>
                      @endforeach
                    </select>
                  </form>
                  <script>
                      $(document).ready(()=>{
                        $('#department_course').on('change',()=>{
                          $('#myform').submit()
                        })
                      })
                    </script>
                  </div>
                @endif
              </div>
             @if(count($students)== 0 && $department)
             <div class="card-header">
              <h4 class="card-title">No Student found in {{$department->name}}</h4>
            </div>
            @endif

            @if(count($students) > 0)
             <div class="card-header">
              <h4 class="card-title">Students in {{$department->name}}</h4>
            </div>

              <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Database Id</th>
                      <th>Full Name</th>
                      <th>Matric NUmber</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                @php $sn = 1; @endphp
                  @foreach($students as $student)
                      @php $std = Helper::get_student($student->student_id);   @endphp
                    <tr>
                      <td>{{$sn++}}</td>
                      <td>{{$std->Full_Name}}</td>
                      <td>{{$std->matric_number}}</td>
                      <td>
                        <a class='btn btn-success btn-xs' href='/admin/course/view-carry-over/{{base64_encode($std->matric_number)}}'> View</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            @endif
            </div>
          </div>
        </div>
      </div>

</div>
@endsection

    @section('extrascript')
    <!-- dataTables -->
    <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
    {{-- <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script> --}}
    <script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>
    <script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>

    <script>
      $(document).ready(function() {

        //datatables code
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              "pageLength": 50,
              responsive: true,
              dom: "Bfrtip",
              buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();

   });


   
   </script>
   <!-- /validator -->
@endsection


