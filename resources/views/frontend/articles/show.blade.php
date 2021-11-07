@extends('layouts.homepage_layout')

@section('style')
<link rel="stylesheet" href="{{ URL::asset('homepage/css/blog.css')}}" type="text/css" media="all" />
@endsection
@section('content')

<div class="blog-single gray-bg">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-8 m-15px-tb">
                <article class="article">
                    <div class="article-img">
                        <img src="/uploads/images/articles/{{ ($article->image) }}" title="" alt="">
                    </div>
                    <div class="article-title">
                        <h6><a href="#">{{$article->type}}</a></h6>
                        <h2>{{$article->heading}}</h2>
                        <div class="media">
                            <div class="avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                            </div>
                            <div class="media-body">
                                <label>{{$article->user->name}}</label>
                                <span>{{$article->createdAtHuman}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-content">
                        {!! $article->content !!}
                    <div class="nav tag-cloud">
                        <a href="{{url('/')}}">Go Back</a>
                    </div>
                </article>
                {{-- <div class="contact-form article-comment">
                    <h4>Leave a Reply</h4>
                    <form id="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Email" id="email" placeholder="Email *" class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="send">
                                    <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
            <div class="col-lg-4 m-15px-tb blog-aside">
                <!-- Author -->
                {{-- <div class="widget widget-author">
                    <div class="widget-title">
                        <h3>Author</h3>
                    </div>
                    <div class="widget-body">
                        <div class="media align-items-center">
                            <div class="avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                            </div>
                            <div class="media-body">
                                <h6>Hello, I'm<br> Rachel Roth</h6>
                            </div>
                        </div>
                        <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores</p>
                    </div>
                </div> --}}
                <!-- End Author -->
                <!-- Trending Post -->
                {{-- <div class="widget widget-post">
                    <div class="widget-title">
                        <h3>Trending Now</h3>
                    </div>
                    <div class="widget-body">

                    </div>
                </div> --}}
                <!-- End Trending Post -->
                <!-- Latest Post -->
                <div class="widget widget-latest-post">
                    <div class="widget-title">
                        <h3>Trending Now</h3>
                    </div>
                    <div class="widget-body">
                        @if (count($articles) > 0)
                           
                        
                        @foreach ($articles as $article)
                        <div class="latest-post-aside media">
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                    <h5><a href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">{{$article->heading}}</a></h5>
                                </div>
                                <div class="lpa-meta">
                                    <a class="name" href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">
                                        {{$article->user->name}}
                                    </a>
                                    <a class="date" href="/article/{{$article->id}}/{{str_slug($article->heading, '-')}}">
                                        {{$article->createdAtHuman}}
                                    </a>
                                </div>
                            </div>
                            <div class="lpa-right">
                                <a href="#">
                                    <img src="/uploads/images/articles/{{ ($article->image) }}" title="" alt="">
                                </a>
                            </div>
                        </div>
                      
                        @endforeach

                        <div class="d-flex justify-content-center">
                            {!! $articles->links() !!}
                        </div>
                         @else

                        <div class="widget widget-post">
                            <div class="widget-title">
                                <h3>No Trending Article</h3>
                            </div>
                            <div class="widget-body">
        
                            </div>
                        </div>
                      
                        @endif
                       
                      
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection