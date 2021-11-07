@extends('layouts.master')

@section('title', 'Faculty')

@section('content')

        <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Question<small> edit & update</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" action="{{route('teacher-evaluation-qs.update', $question->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                            <div class="form-group">
                                <label>Question Title: </label>
                                <input class="form-control" name="question_title" value="{{ $question->question_title }}"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-md pull-right">update</button>
                            </div>
                        </form>
                    </div>
                    </div>
                <!-- row end -->
                <div class="clearfix"></div>

                </div>
            </div>
        <!-- /page content -->
        </div>
    </div>
@endsection
