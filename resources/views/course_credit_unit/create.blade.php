@extends('layouts.master',['title'=>'Maximum Credit Unit'])


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Maximum Credit Unit','Title'=>'Credit Unit'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Maximum Credit Unit</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('homepage.flash_message')
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <form class="form-horizontal form-label-left" method="post"
                                action="{{ route('max-course-credit-unit.store') }}">
                                @csrf
                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Faculty <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              <select name="faculty_id" class="form-control" id="facultyyy">
                                                  <option> Select Faculty</option>
                                                @forelse ($faculties as $faculty)
                                                  <option value="{{$faculty->id}}">{{$faculty->name}}</option> 
                                                @empty
                                                    
                                                @endforelse
                                              </select>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('faculty_id') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Departments <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              <select name="department_id" class="form-control" id="department_select_select">
                                                  <option> Select Department</option>

                                              </select>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label" for="firstname"> Program <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="program_id" class="form-control">
                                                    <option> Select Programe</option>
                                                  @forelse ($programs as $program)
                                                    <option value="{{$program->id}}">{{$program->name}}</option> 
                                                  @empty
                                                      
                                                  @endforelse
                                                </select>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('program_id') }}</span>
                                          </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label" for="firstname"> Level <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select name="program_level" class="form-control" required>
                                                    <option> Select Level</option>
                                                    <option value="100">100</option>
                                                    <option value="200">200</option>
                                                    <option value="300">300</option>
                                                    <option value="400">400</option>
                                                    <option value="500">500</option>
                                                </select>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('program_level') }}</span>
                                          </div>
                                      
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label" for="firstname"> Maximum Credit Unit <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" name="max_credit_unit" class="form-control">
                                            </div>
                                            <span class="text-danger">{{ $errors->first('max_credit_unit') }}</span>
                                          </div>
                                      
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label" for="firstname"> Minimum Credit Unit <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" name="min_credit_unit" class="form-control">
                                            </div>
                                            <span class="text-danger">{{ $errors->first('min_credit_unit') }}</span>
                                          </div>
                                      
                                    </div>
                                   
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Return Back</a>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection


@section('extrascript')

<script>
    // when country dropdown changes

    $('#facultyyy').change(function() {

        var facultyID = $(this).val();
        if (facultyID) {

            $.ajax({
                type: "GET",
                url: "{{ url('get-department-list-json') }}?faculty_id=" + facultyID,
                success: function(res) {

                    if (res) {

                        $("#department_select_select").empty();
                        $("#department_select_select").append('<option>Select Department</option>');
                        $.each(res, function(key, value) {
                            $("#department_select_select").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {

                        $("#department_select_select").empty();
                    }
                }
            });
        } else {

            $("#department_select_select").empty();
            // $("#city").empty();
        }
    });

    

</script>

@endsection