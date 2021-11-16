@extends('layouts.master',['title'=>'All Courses'])


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
                    <label>Select Department to View Courses</label>
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
             @if(count($courses)== 0 && $department)
             <div class="card-header">
              <h4 class="card-title">No Courses found in {{$department->name}}</h4>
            </div>
            @endif

            @if(count($courses) > 0)
             <div class="card-header">
              <h4 class="card-title">Courses in {{$department->name}}</h4>
              <a href="/admin/course/programme/{{$department->id}}" class="btn btn-primary">View Programmes</a>
            </div>

              <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Database Id</th>
                      <th>Course Code</th>
                      <th>Course Name</th>
                      <th>Type</th>
                      <th>Credit</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  @foreach($courses as $course)
                    <tr>
                      <td>{{$course->id}}</td>
                      <td>{{$course->course_code}}</td>
                      <td>{{$course->course_name}}</td>
                      <td>{{$course->type}}</td>
                      <td>{{$course->unit}}</td>
                      <td>{{$course->remarks}}</td>
                      <td>
                            @if($course->status==1)
                            <span class='btn btn-success btn-xs' > <i class="fa fa-ok icon-white"></i> Active</span>
                            @else
                             <span class='btn btn-danger btn-xs' > <i class="glyphicon fa fa-remove icon-white"></i> Inactive</span>
                            @endif
                            
                      </td>
                      <td>
                   <div class="btn-group">
                    @permission('course-edit')
                    <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$course->id}}' href='/admin/course/edit/{{base64_encode($course->id)}}'> Edit</a>
                    @endpermission
                     @permission('course-delete')
                    <form class="deleteForm" method="POST" action="{{URL::route('course.destroy',$course->id)}}">
                      {{csrf_field()}} 
                       {{ method_field('DELETE') }} 
                    <button type="submit" class='btn btn-danger btn-xs btnDelete'  onclick="return confirm('Are you sure want to delete this?');"> Delete </button>
                    </form>
                   @endpermission
                   </div>
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


