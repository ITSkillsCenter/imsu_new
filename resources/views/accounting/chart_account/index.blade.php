@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Import Student','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Balance Sheet</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-12">
               
                        <div class="x_panel">
                              <div class="x_title">
                                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#BS">
                                      +ADD NEW
                                  </button> 
                              </div>
                             
                              <div class="card-body">
                                  <div class="table-responsive">
                                      @foreach($bs_items as $category)
                                      <ul>
                                          <li><h5><b><a href="/{{$category->id}}">{{$category->name}}</a>-<span style="float:right;">@include('accounting.chart_account.bal_parent',['chartAccount' => $category->id])</span></h5> </b></li>
                                          @if(count($category->childs))
                                              @include('accounting.chart_account.sub_account',['subcategories' => $category->childs])
                                          @endif
                                      </ul>
                                       @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Income Statement</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <div class="x_title">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#IS">
                                    +ADD NEW
                                </button> 
                            </div>
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    @foreach($is_items as $category)
                                    <ul>
                                        <li><h5><b><a href="/{{$category->id}}">{{$category->name}}</a>-<span style="float:right;">@include('accounting.chart_account.bal_parent',['chartAccount' => $category->id])</span></h5> </b></li>
                                        @if(count($category->childs))
                                            @include('accounting.chart_account.sub_account',['subcategories' => $category->childs])
                                        @endif
                                    </ul>
                                     @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


     <!--Balance Sheet Modal -->
     <div class="modal fade" id="BS"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Balance Sheet Create</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div>
              
                <form action="{{route('chart_account.store')}}" method="post">
                  @csrf
                  
                    <div class="card-body pb-0">
                      <div class="form-group">
                        <label>Account Name(*)</label>
                        <div class="input-group">
                          <input type="text" name="name" class="form-control" >
                          <input type="hidden" name="account" value="BS" >
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Select Group(*)</label>
                          <div class="input-group">
                            <select name="parent_id" class="form-control select2">
                              <option value="0">Primary</option>
                              @foreach($bs_items as $category)
                              <ul>
                                <li><option value="{{$category->id}}"><b>{{$category->name}}</b>
                                  </option></li>
                                  @if(count($category->childs))
                                      @include('accounting.chart_account.sub_option',['subcategories' => $category->childs])
                                  @endif
                              </ul>
                           @endforeach
                          </select>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"> <i class="fas fa-check"></i> Save</button>
                    </div>
                  </form>
                  </div>
              </div>
        
        </div>
      </div>
    </div>
  
       <!--Income Statement Modal -->
       <div class="modal fade" id="IS"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Income Statement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div>
                      <form action="{{route('chart_account.store')}}" method="post">
                          @csrf
                          
                            <div class="x_content pb-0">
                              <div class="item form-group">
                                  <label>Account Name(*)</label>
                                  <div class="input-group">
                                    <input type="text" name="name" class="form-control">
                                    <input type="hidden" name="account" value="IS" >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
                              <div class="form-group">
                                  <label>Select Group</label>
                                  <div class="input-group">
                                    
                                    <select name="parent_id" class="form-control select2">
                                      <option value="0">Primary</option>
                                      @foreach($is_items as $category)
                                      <ul>
                                        <li><option value="{{$category->id}}"><b>{{$category->name}}</b>
                                          </option></li>
                                          @if(count($category->childs))
                                              @include('accounting.chart_account.sub_option',['subcategories' => $category->childs])
                                          @endif
                                      </ul>
                                   @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="card-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary"> <i class="fas fa-check"></i> Save</button>
                            </div>
                          </form>
                      </div>
                  </div>
            
            </div>
          </div>
      <!-- /page content -->
    </div>

  @endsection
