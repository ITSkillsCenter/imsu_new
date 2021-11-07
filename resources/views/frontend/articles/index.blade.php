@extends('layouts.homepage_layout')

@section('style')
<link rel="stylesheet" href="{{ URL::asset('homepage/css/bloglist.css')}}" type="text/css" media="all" />
@endsection

@section('content')

<div class="container bootstrap snippets bootdey" style="margin-top: 50px">
    <div class="row">
        @if (count($articles))

        @forelse($articles as $article)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="well blog">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-12">
                        <div class="image">
                            <img src="/uploads/images/articles/{{$article->image ?? '1629202215.jpg'}}" alt="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-12">
                        <div class="blog-details">
                            <h2>{{$article->heading}} - <br> <small><a href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">{{ date("F j, Y", strtotime($article->published_at)) }}</a></small></h2>
                            {!!str_limit($article->content, 190, '....')!!} <br /><a href='/article/{{$article->id}}/{{str_slug($article->heading, '-')}}' class='btn btn-info btn-sm' style="color:white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{method_exists($articles, 'links') ? $articles->links() : ''}}
        @else

        No POst

        @endif


    </div>
</div>
@endsection