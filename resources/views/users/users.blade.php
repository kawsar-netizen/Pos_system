@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
        <div class="col-md-6">
        <h1> Users List </h1>
        </div>
        <div class="col-md-6 text-right">
        <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add User</a>
        </div>
    </div>
    <div class="card shadow mb-4">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Group</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $users as $user)
                                        <tr>
                                            <td>{{ $user->id}}</td>
                                            <td>{{ $user->group_id}}</td>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->email}}</td>
                                            <td>{{ $user->phone}}</td>
                                            <td>{{ $user->address}}</td>
                                            <td class="text-right">

                                                <form action="{{route('users.destroy',['user' => $user->id])}}" method="post">
                                                @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}"> 
			              	 	                   <i class="fa fa-edit"></i></a>
                        
                                                      @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                                        <i class="fa fa-trash"></i>  
                                                    </button>
                                                </form>

                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@stop