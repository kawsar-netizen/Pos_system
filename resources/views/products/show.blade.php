@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
    <div class="col-md-4">
    <a href="{{route('Products.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Back</a>
    </div>
        <div class="col-md-8 text-right">
        <a href="{{url('Products/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Sale</a>
        <a href="{{url('Products/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Purchase</a>
        <a href="{{url('Products/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Payment</a>
        <a href="{{url('Products/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Receipt</a>
        </div>
    </div>
    <div class="card shadow mb-4">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$product->name}}</h6>
                        </div>
                        <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                    <table class='table table-striped'>
                                    <tr>
                                        <th class='text-right'>Category :</th>
                                        <td>{{$product->category->title}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Title :</th>
                                        <td>{{$product->title}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Cost Price :</th>
                                        <td>{{$product->cost_price}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Price :</th>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Unit :</th>
                                        <td>{{$product->unit}}</td>
                                    </tr>
                                    <tr>
                                        <th class='text-right'>Description :</th>
                                        <td>{{$product->descrition}}</td>
                                    </tr>
                                </table>
                                
                                </div>
                            </div>
                        </div>
                    </div>

@stop