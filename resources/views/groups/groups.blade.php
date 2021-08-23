@extends('layout.main')
@section('main_content')
    <div class="row clearfix page_header">
        <div class="col-md-6">
        <h1> User Groups </h1>
        </div>
        <div class="col-md-6 text-right">
        <a href="{{route('groups_create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Group</a>
        </div>
    </div>

<div class="card shadow mb-4">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Group Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($groups as $group)
                                        <tr>
                                            <td>{{$group->id}}</td>
                                            <td>{{$group->title}}</td>
                                            <td class='text-right'>
                                                <form action="{{url('groups/' .$group->id)}}" method ="post">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are You Sure?')"class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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