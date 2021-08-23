@extends('layout.main')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
    <h1> Create New Group </h1>
    </div>
</div>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
        </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
            <form action="{{route('groups_store')}}" method="post">
            @csrf
                <div class="form-group">
                <label for="title">User Group Title</label>
                    <input type="title" class="form-control" name='title' placeholder="User Group Title">
                    <small class='form-text text-muted'>Title of Users Group </small>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
            </div>
        </div>
        </div>

</div>
@stop