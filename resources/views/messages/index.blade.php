@extends('layouts.master',['Articles'=>'title'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Messages','Title'=> ucfirst($type)])

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">List Of {{ucfirst($type)}}</div>
                </div>
                <div class="card-header">
                    <a href="{{route('message.create', $type)}}" class="btn btn-info"><i class="fa fa-plus"></i> Create Message</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <table class="table table-hover">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Body</th>
                                    <th>Type</th>
                                    <th>Number of Receivers</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Operations</th>
                                </tr>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->id}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{!!trimString($message->body, 100)!!} ...</td>
                                    <td class="text-center">{{$message->type}}</td>
                                    <td class="text-center">{{count($message->receivers)}}</td>
                                    <td class="text-center">{{$message->status}}</td>
                                    <td class="text-center">{{$message->createdAtHuman}}</td>
                                    <td class="text-center">
                                        <a href="" target="_blank">
                                            <span class="fa fa-eye text-primary"></span>
                                        </a>&nbsp;
                                        <!-- <a href="">
                                            <span class="fa fa-edit text-primary"></span>
                                        </a>&nbsp;
                                        <a href="" onclick="return confirm('Are you sure to delete?')">
                                            <span class="fa fa-trash text-danger"></span>
                                        </a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection