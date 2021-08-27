@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
    <div class="col-md-4">
    <a href="{{route('users.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Back</a>
    </div>
        <div class="col-md-8 text-right">
        <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Sale</a>
        <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Purchase</a>
        <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Payment</a>
        <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Receipt</a>
        </div>
    </div>
    <div class="card shadow mb-4">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}</h6>
                        </div>
                        <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                    <table class='table table-striped'>
                                    <tr>
                                        <th class='text-right'>Group :</th>
                                        <td>{{$user->group->title}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Name :</th>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Phone :</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Email :</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Address :</th>
                                        <td>{{$user->address}}</td>
                                    </tr>
                                </table>
                                
                                </div>
                            </div>
                        </div>
                    </div>

@stop