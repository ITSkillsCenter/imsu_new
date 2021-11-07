@extends('layouts.master',['title'=>'Ledger'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Account','Title'=>'Ledge'])
      
     <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><h2>Particular<small> Ledger  particular information.</small></h2></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('fee.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
                      <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Account Head
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control col-md-12 col-sm-12 col-xs-12" name="chart_account_id" required="required">
                              @foreach($fees as $fee)
                                 <option   value="{{$fee->id}}">{{$fee->name}}-{{$fee->account}}</option>
                              @endforeach
                          </select>
                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="fee_name">Particular Name <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="fee_name" type="text" class="form-control col-md-12 col-sm-12 col-xs-12"  name="fee_name"   placeholder="Bank Payment TBL-136" required="required" type="text">
                            <span class="text-danger">{{ $errors->first('fee_name') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Account Type
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control col-md-12 col-sm-12 col-xs-12" name="account_type" required="required">
                            <option   value="Dr">Dr</option>
                            <option   value="Cr">Cr</option> 
                          </select>
                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="section">Section
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control col-md-12 col-sm-12 col-xs-12" name="section" required="required">
                            <option   value="fee">Fee</option>
                            <option   value="less">Less</option>
                            <option   value="paid">Paid</option>
                            <option   value="due">Due</option>
                          </select>
                            <span class="text-danger">{{ $errors->first('section') }}</span>
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Entry
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control col-md-12 col-sm-12 col-xs-12" name="status" required="required">
                            <option   value="1">Active for Regular Registration</option>
                            <option   value="2">Active for Term Repeat</option>
                            <option selected value="0">Ledger</option> 
                          </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>
                      </div>
                      
                      
                      
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <div class="btn-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                            &nbsp;
                            <a href="{{url('admin/fee')}}" class="btn btn-info">Return Back</a>
                        </div>
                        </div>
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
