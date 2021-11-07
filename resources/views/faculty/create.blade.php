@extends('layouts.master',['title'=>'Faculty'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Create Faculty','Title'=>'Faculty'])
      
     <div class="row">
        <div class="col-md-12">
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            <div class="col-md-12">
              @include('homepage.flash_message')
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><h2>Faculty<small> Faculties basic information.</small></h2>
                    </div>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <form action="{{ route('faculty.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                           <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Faculty Name: </label>
                                <input type="text" name="name" class="form-control" required>
                              </div>
        
                            </div>

                            <div class="col-md-6">
                          
                              <div class="form-group">
                                <label for="">Faculty Short Name: </label>
                                <input type="text" name="short_name" class="form-control" required>
                              </div>
        
                            </div>
                            
                           
                            <div class="col-md-6">
        
                              <div class="form-group">
                                <label for="">Faculty Email: </label>
                                <input type="email" name="email" class="form-control" required>
                              </div>

                            </div>
                              
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Faculty Status: </label>
                              <select name="status" class="form-control" required>
                                <option value="" selected disabled>Please choose a value...</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                                <option value="3">On Study Leave</option>
                              </select>
                            </div>
                           </div>
                           </div>



                              <div class="form-group">
                                <label for="">Faculty Image: </label>
                                <input type="file" name="picture" class="form-control" required>
                              </div>

                              <div class="form-group">
                                <label for="">About: </label>
                                <textarea name="about" id="" cols="30" rows="10" class="form-control" required></textarea>
                              </div>

                              <div class="form-group">
                                <label for="">Why study here: </label>
                                <textarea name="why_study_here" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>

                              <div class="form-group">
                                <label for="">Alumni: </label>
                                <textarea name="alumni" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>

                              <div class="form-group">
                                <label for="">Benefit: </label>
                                <textarea name="benefit" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>

                              <div class="form-group">
                                <label for="">Phone Number: </label>
                                <input type="phone_number" name="phone_number" class="form-control">
                              </div>

                              <div class="form-group  btn-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                                &nbsp;
                                <a href="{{url('admin/faculty')}}" class="btn btn-info">Return Back</a>
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
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<!-- validator -->
   <script>
     // initialize the validator function
     validator.message.date = 'not a real date';

     // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
     $('form')
       .on('blur', 'input[required], input.optional, select.required', validator.checkField)
       .on('change', 'select.required', validator.checkField)
       .on('keypress', 'input[required][pattern]', validator.keypress);


     $('form').submit(function(e) {
       e.preventDefault();
       var submit = true;

       // evaluate the form using generic validaing
       if (!validator.checkAll($(this))) {
         submit = false;
       }

       if (submit)
         this.submit();

       return false;
     });
   </script>

   <!-- /validator -->
@endsection
