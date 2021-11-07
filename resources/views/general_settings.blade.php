@extends('layouts.master',['title'=>'Create Article'])

@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'General Settings','Title'=>'Settings'])
    @role('super-admin')
    <div class="row">
        <div class="col-md-12">
            @include('homepage.flash_message')
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9 col-lg-9">

                        <div class="card no-margin-bottom">
                            <div class="card-header">
                                <div class="card-title">Admin Settings</div>
                            </div>
                            <div class="card-body" id="create-article">
                               
                                <div class="form-group">
                                    <label for="title">HOD Approval:</label>
                                    <select name="hod_approval" id="" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="on" {{$settings !== null && $settings->hod_approval == 'on' ? 'selected': '' }}>On</option>
                                        <option value="off" {{$settings !== null && $settings->hod_approval == 'off' ? 'selected': '' }}>Off</option>
                                    </select>
                                </div>



                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
    @endrole

    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-9 col-lg-9 card no-margin-bottom">
                <div class="card-header">
                    <div class="card-title">General Settings</div>
                </div>
                <div class="card-body" id="create-article">
                    @if($isEnabled == null)
                    <a href="/2fa">Enable 2FA</a>
                    @else
                    <a href="/2fa">Disable 2FA</a>
                    @endif
                </div>

            </div>

        </div>
    </div>
    @endsection