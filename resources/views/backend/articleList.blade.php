@extends('layouts.master',['Articles'=>'title'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Article List','Title'=>'Article List'])

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">List Of Articles</div>
                </div>
                <div class="card-header">
                    <a href="{{route('create-article')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Article</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h4>All Articles &nbsp;<a href="{{route('create-article')}}">
                                    <span class="fa fa-plus"></span></a></h4>

                            <form method="get" class="form-inline d-inline text-right">
                                <select name="category" class="form-control margin-left-30">
                                    <option value="">All categories</option>
                                    @foreach($navCategories as $category)
                                    <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                                <button class="fa fa-search btn btn-success"></button>
                            </form>


                            <table class="table table-hover">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Written</th>
                                    <th>Language</th>
                                    <th>Published</th>
                                    <th>Edited</th>
                                    <th>Comments</th>
                                    <th>Operations</th>
                                </tr>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>
                                        <a href="{{route('get-article', [$article->id, str_slug($article->heading, '-')])}}" target="_blank">{{$article->heading}}</a>
                                    </td>
                                    <td>{{$article->categoryName}}</td>
                                    <td class="text-center">{{$article->createdAtHuman}}</td>
                                    <td class="text-center">{{$article->language}}</td>
                                    <td class="text-center">
                                        <span class="{{!$article->is_published?'hide':''}}">{{$article->publishedAtHuman}}</span>
                                    </td>
                                    <td class="text-center">{{$article->updatedAtHuman}}</td>
                                    <td class="text-center">{{$article->is_comment_eanabled ? $article->comment_count : 'N/A'}}</td>
                                    <td class="text-center">
                                        <a href="{{route('get-article', [$article->id, str_slug($article->heading, '-')])}}" target="_blank">
                                            <span class="fa fa-eye text-primary"></span>
                                        </a>&nbsp;
                                        <a href="{{route('edit-article', $article->id)}}">
                                            <span class="fa fa-edit text-primary"></span>
                                        </a>&nbsp;
                                        <a href="{{route('toggle-article-publish', $article->id)}}">
                                            <strong class="fa fa-lg {{$article->is_published ? 'fa-toggle-on text-success' : 'fa-toggle-off text-grey'}}" title="Toggle publish"></strong>
                                        </a>&nbsp;
                                        <a href="{{route('delete-article', $article->id)}}" onclick="return confirm('Are you sure to delete?')">
                                            <span class="fa fa-trash text-danger"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{$articles->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection