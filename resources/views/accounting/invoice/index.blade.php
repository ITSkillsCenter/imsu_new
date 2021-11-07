@extends('layouts.master',['title'=>'invoice'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Invoice','Title'=>'Invoice'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">     <h2>Particular<small> Create Bulk Invoice.</small></h2></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            
                            <form class="form-horizontal form-label-left" method="post">
                                @include('homepage.flash_message')
    
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Fee type
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control col-md-12 col-sm-12 col-xs-12" name="fee_id" id="department_fees" required="required">
                                            <option value="">Select fee</option>
                                            @foreach($fee_list as $fee)
                                                <option value='{{$fee->id}}' data-id='{{$fee->amount}}'>{{$fee->fee_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('semester') }}</span>
                                    </div>
                                </div>
    
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Department
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control col-md-12 col-sm-12 col-xs-12" name="department_id" id="departments" required="required">
                                            <option value="">Select department</option>
                                            @foreach($departments as $department)
    
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('semester') }}</span>
                                    </div>
                                </div>
    
                                
    
                                <!-- <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="fee_name">Fee Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="fee_name" type="text" class="form-control col-md-12 col-sm-12 col-xs-12" name="fee_name" placeholder="Bank Payment TBL-136" required="required" type="text">
                                        <span class="text-danger">{{ $errors->first('fee_name') }}</span>
                                    </div>
                                </div> -->
    
    
                                <div class="item form-group" id="students">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12">Students*  </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="student_container" style="max-height: 250px; overflow: auto;">
                                            Students
                                        </div>
                                        <br>
                                        <div class="help-block fn_check_button display">
                                            <button id="check_all" type="button" class="btn btn-success btn-xs">Check all</button>
                                            <button id="uncheck_all" type="button" class="btn btn-success  btn-xs">Uncheck all</button>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="is_applicable_discount?">Is Applicable Discount *</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select  class="form-control col-md-12 col-sm-12 col-xs-12" name="is_applicable_discount" id="is_applicable_discount2" required="required">
                                            <option value="">Select</option>                                                                                    
                                            <option value="yes">Yes</option>                                           
                                            <option value="no">No</option>                                           
                                        </select>
                                    </div>
                                </div>
    
                                <div class="item form-group" style="display: none;" id="discount_div2">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="">Discount(%)</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" class="form-control col-md-12 col-sm-12 col-xs-12" value="" name="amount" id="add_amount2" />
                                        <input class="form-control col-md-12 col-sm-12 col-xs-12" value="" name="discount" id="discount2" />
                                        <div class="help-block" id="discount_block2"></div>
                                    </div>
                                </div>
    
    
                                <input name="status" type="hidden" value="unpaid" />
    
    
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Session
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control col-md-12 col-sm-12 col-xs-12" name="session_id" required="required">
                                            <option value="">Select Session</option>
                                            @foreach($sessions as $sess)
                                            <option value="{{$sess->id}}">{{$sess->title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('session') }}</span>
                                    </div>
                                </div>
    
                                <div class="item form-group" id="">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="">Due Date</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input class="form-control col-md-12 col-sm-12 col-xs-12" value="" type="date" name="due_date" id="due_date" required/>
                                    </div>
                                </div>
    
                                @csrf
    
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-lg btn-success"><i class="fa fa-check"> Save</i></button>
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
    // $('form')
    //     .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    //     .on('change', 'select.required', validator.checkField)
    //     .on('keypress', 'input[required][pattern]', validator.keypress);


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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#departments').change(function() {
        let dept_id = $(this).find(":selected").val();
        let fee_chosen = $('#department_fees').val();
        $('#student_container').html('')
        // $('#department_fees').find('option').remove().end().append('<option value="">Select fee</option>').val('')
        $.post('/admin/get_department_fees', {
            dept_id, fee_chosen
        }).done(function(response) {
            response.students.map((item) => {
                $('#student_container').append(`<div class="col-sm-3"><input type="checkbox" name="students[]" checked value="${item.id}" />${item.first_name} ${item.last_name}</div>`)
            })
        });
    })

    $('#department_fees').change(function(){
        let amount = $(this).find(":selected").data('id')
        $('#add_amount2').val(amount)
    })

    $('#check_all').on('click', function(){
        $('#student_container').children().find('input[type="checkbox"]').prop('checked', true);
    });
    $('#uncheck_all').on('click', function(){
        $('#student_container').children().find('input[type="checkbox"]').prop('checked', false);
    });

    $('#is_applicable_discount2').change(function(){
        if($(this).val() == 'yes'){
            $('#discount_div2').slideDown()
        }else{
            $('#discount_div2').slideUp()
        }
    })

    // $('#discount').on('change', function(){
    //     let amount = $('#add_amount').val()
    //     let discount = $(this).val()
    //     let disc = Number(amount) * (Number(discount) / 100)
    //     $('#discount_block').html('Discount amount is ' + disc)
    //     $('#discount_block').css('color', 'green')
    // });

    $('#discount2').on('change', function(){
        let amount = $('#add_amount2').val()
        let discount = $(this).val()
        let disc = Number(amount) * (Number(discount) / 100)
        $('#discount_block2').html('Discount amount is ' + disc)
        $('#discount_block2').css('color', 'green')
    });
</script>

<!-- /validator -->
@endsection