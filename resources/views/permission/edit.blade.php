@extends('layouts.master',['title'=>'Role| Edit'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Role-Edit','Title'=>'Permission'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Permission Permission update Information</div>
                </div>
                <form action="{{route('permission.update',$permission->id)}}" method="post" role="form">
                  {{method_field('PATCH')}}
                  {{csrf_field()}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                          
                        
                              <div class="form-group">
                                <label for="name">Name of Permission</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Name of Permission" value="{{$permission->name}}">
                              </div>
                                <div class="form-group">
                                <label for="display_name">Display name</label>
                                <input type="text" class="form-control" name="display_name" id="" value="{{$permission->display_name}}" placeholder="Display name">
                              </div>
                                <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="" placeholder="Description" value="{{$permission->description}}">
                              </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Return Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
   
 
</div>
@endsection


@section('extrascript')
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
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
