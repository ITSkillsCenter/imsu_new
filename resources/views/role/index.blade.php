@extends('layouts.master',['title'=>'User Role'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'User Role','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">  
                       <h2>User Role</h2></div>
                </div>

                <div class="card-header">
                  <div class="d-flex align-items-center">
                    {{-- <h4 class="card-title">Create User</h4> --}}
                        {{-- <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal" data-target=".create-semester-modal">+ Add New</button> --}}
                        {{-- <a class="" href="{{ route('transfer.create') }}">+Add Student</a> --}}
                        @role('super-admin')
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('role.create')}}"> <i class="fa fa-plus"></i> Create Role</a>
                        @endrole
                  </div>
                </div>
                <div class="card-body">
                  <table id="basic-datatables" class="display table table-striped table-hover" >
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                    @forelse($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                               <div class="btn-group">
                                <a class="btn btn-info btn-sm" href="{{route('role.edit',$role->id)}}">Edit</a>
                                &nbsp;
                                <form action="{{route('role.destroy',$role->id)}}"  method="POST">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                  <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                </form>
                               </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No roles</td>
                        </tr>
                        @endforelse

                </table>
                   
                </div>
                
            </div>
        </div>
    </div>
   
 
</div>
@endsection


@section('extrascript')


@endsection