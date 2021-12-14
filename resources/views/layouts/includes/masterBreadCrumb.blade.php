<div class="panel-header bg-primary-gradient">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"> <span class="mr-4">Dashboard</span>  <span style="font-size: 20px;">{{\Helper::get_current_semester()}} ACADEMIC SESSION. </span>  <span style="font-size: 20px;">{{strtoupper(\Helper::get_sem())}}.</span>  <span style="font-size: 20px;"> {{now()->format('d/m/Y')}}</span></h2>
                <h5 class="text-white pb-7 mb-2 row">
                    @if(Session::has('student'))
                    @php $credit = Helper::get_credit_unit(Session::get('student')['id']); @endphp
                    <div class="col-lg-6">Minimum Credit: {{$credit->min_credit_unit}} </div>
                    <div class="col-lg-6">Maximum Credit: {{$credit->max_credit_unit}}</div>
                    @endif
                </h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <h1 id="clock" style="color:#f7c115;">
                
            </div>
        </div>
    </div>
</div>