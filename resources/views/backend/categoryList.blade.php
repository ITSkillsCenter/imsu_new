@extends('layouts.master',['title'=>'Categories'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Categories','Title'=>'Categories'])
      
     <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('add-category')}}" class="table-responsive">
                {{csrf_field()}}
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Category</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group {{$errors->has('name') ? 'has-error has-feedback' : ''}}">
                                    <input type="text" name="name" class="form-control" placeholder="Name*" value="{{old('name')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Alias</label>
                            <div class="input-group {{$errors->has('alias') ? 'has-error has-feedback' : ''}}">
                                    <input type="text" name="alias" class="form-control" placeholder="Alias*" value="{{old('alias')}}" required>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Parent</label>
                            <div class="input-group {{$errors->has('alias') ? 'has-error has-feedback' : ''}}">
                                <select name="type" id="" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="blog">Blog</option>
                                    <option value="menu">Menu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Parent</label>
                            <div class="input-group {{$errors->has('alias') ? 'has-error has-feedback' : ''}}">
                                    <select name="parent_category_id" id="" class="form-control">
                                        <option value="">Select Parent</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-action">
                <button class="btn btn-success">Submit</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <div class="card-title">Category</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Created</th>
                                <th>Articles</th>
                                <th >Operations</th>
                                <th >Operations</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->alias}}</td>
                                <td>{{$category->createdAtHuman}}</td>
                                <td>
                                    @foreach($category->parent as $parent_cat)
                                    {{json_decode($parent_cat)->name}}
                                @endforeach
                                
                                </td>
                        
                                <td>
                                    <a href="{{route('articles-by-category', $category->alias)}}" target="_blank">{{$category->articles->count()}}</a>
                                </td>
                                <td >
    
                                    <!-- Button trigger modal -->
                           <div class="btn-group">
                            <a href="#" class="pointer" cate-data="{{$category}}">
                                <span class="fa fa-edit text-primary"></span>
                            </a>


                            <a href="{{route('toggle-category-active', $category->id)}}">
                                <span class="fa fa-lg {{$category->is_active ? 'fa-toggle-on text-success' : 'fa-toggle-off text-grey'}}"></span>
                            </a>
                            <a href="{{route('delete-category', $category->id)}}" onclick="return confirm('Are you sure to delete')">
                                <span class="fa fa-trash text-danger"></span>
                            </a>
                           </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             
            </div>
            
        </div>
     </form>
        </div>
      
    </div>
   
 
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form  id="category-form" method="POST">
                {{csrf_field()}}
                @method('PUT')
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="form-group {{$errors->has('name') ? 'has-error has-feedback' : ''}}">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            
                        </div>
                        <div class="form-group {{$errors->has('alias') ? 'has-error has-feedback' : ''}}">
                            <label for="alias">Alias</label>
                            <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias">
                        </div>
                        
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
            </form>
		</div>
	</div>
</div>
@endsection


@section('extrascript')
@parent
<script type="application/javascript">
    $(document).ready(function() {
        $(".pointer").click(function() {

            var category = $(this).attr('cate-data'),
                obj = JSON.parse(category);

            $("#name").val(obj.name);
            $("#alias").val(obj.alias);
            $("#category-form").attr("action", "category/" + obj.id);
            $("#exampleModalCenter").modal("show");
        });
    });
</script>
@endsection