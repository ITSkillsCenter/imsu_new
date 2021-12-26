@extends('layouts.master',['title'=>'Payment History'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Assign Fee by Year','Title'=>'Years'])
    <div class="row">
        <div class="col-lg-12">
            @include('homepage.flash_message')
        </div>
        <form method="post" class="col-lg-12 row">
            <h3 class="col-lg-12">Select fee for Year {{$id}} clearance</h3> <br><br>
            @foreach($feelists as $list)
            <div class="col-md-4">
                <input type="checkbox" name="list[]" value="{{$list->id}}" {{in_array($list->id, $the_list) ? 'checked' : ''}}> {{$list->fee_name}} <br>
            </div>
            @endforeach
            @csrf
            <div class="card-action col-lg-12">
                <br><br>
                <button class="btn btn-success">Submit</button>
                <a href="{{route('account.assign_fee')}}" class="btn btn-danger">Return Back</a>
            </div>
        </form>
    </div>
</div>

@endsection