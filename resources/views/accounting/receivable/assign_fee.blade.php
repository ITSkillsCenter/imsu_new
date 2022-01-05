@extends('layouts.master',['title'=>'Payment History'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Assign Fee by Year','Title'=>'Years'])
    <div class="row">
        <div class="col-lg-12">
            @include('homepage.flash_message')
        </div>
        <div class="col-lg-4">
            <a href="{{ route('account.assign_fee_year', '1') }}" class="card">
                <div class="card-body text-center">
                    <i class="fa fa-book fa-3x"></i> <br><br>
                    Year 1
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a href="{{ route('account.assign_fee_year', '2') }}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x"></i> <br><br>
                    Year 2
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a href="{{ route('account.assign_fee_year', '3') }}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x"></i> <br><br>
                    Year 3
                </div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="{{ route('account.assign_fee_year', '4') }}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x"></i> <br><br>
                    Year 4
                </div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="{{ route('account.assign_fee_year', '5') }}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x"></i> <br><br>
                    Year 5
                </div>
            </a>
        </div>

        <div class="col-lg-4">
            <a href="{{ route('account.assign_fee_year', 'general') }}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x"></i> <br><br>
                    General Fee
                </div>
            </a>
        </div>
    </div>
</div>

@endsection