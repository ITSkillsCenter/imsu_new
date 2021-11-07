@extends('layouts.master',['title'=>'Role - create'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Role - Create','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
          <form action="{{route('role.store')}}" method="post" role="form">
            {{csrf_field()}}

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Role</div>
                </div>
                <div class="card-body">
                  <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Role Name</label>
												<div class="input-group">
                          <input type="text" class="form-control" name="name" id="" placeholder="Role Name" required>
												
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Display name</label>
												<div class="input-group">
                          <input type="text" class="form-control" name="display_name" id="" placeholder="Display name" required>
													
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Description</label>
												<div class="input-group">
												  <input type="text" class="form-control" name="description" id="" placeholder="Description">
													
												</div>
											</div>
										</div>
									</div>

                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group text-left">
                              <h3>Read Permissions</h3>
                              @foreach($permissions as $permission)
                              <?php $val = explode('-',$permission->name);
                              ?>
                              
                              @if($val[1]=='read')
                          <input type="checkbox"   name="permission[]" value="{{$permission->id}}"> {{$permission->name}} <br>
                          @endif
                         @endforeach
                    </div>
                  </div>
                  
                    <div class="col-md-3">
                    <div class="form-group text-left">
                              <h3>Edit Permissions</h3>
                              @foreach($permissions as $permission)
                              <?php $val = explode('-',$permission->name);
                              ?>
                              
                              @if($val[1]=='edit')
                          <input type="checkbox"   name="permission[]" value="{{$permission->id}}"> {{$permission->name}} <br>
                          @endif
                         @endforeach
                      </div>
                  </div>
                  
                    <div class="col-md-3">
                    <div class="form-group text-left">
                              <h3>Create Permissions</h3>
                              @foreach($permissions as $permission)
                              <?php $val = explode('-',$permission->name);
                              ?>
                              
                              @if($val[1]=='create')
                          <input type="checkbox"   name="permission[]" value="{{$permission->id}}"> {{$permission->name}} <br>
                          @endif
                         @endforeach
                      </div>
                  </div>
                  
                    <div class="col-md-3">
                    <div class="form-group text-left">
                              <h3>Delete Permissions</h3>
                              @foreach($permissions as $permission)
                              <?php $val = explode('-',$permission->name);
                              ?>
                              
                              @if($val[1]=='delete')
                          <input type="checkbox"   name="permission[]" value="{{$permission->id}}"> {{$permission->name}} <br>
                          @endif
                         @endforeach
                      </div>
                  </div>
                  
                  </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Return Back</a>
                </div>
            </div>
          </form>
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
   <script>
$(document).ready(function() {

  $("#acyear_start").inputmask();
});
</script>
   <!-- /validator -->
@endsection