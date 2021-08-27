@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
        <div class="col-md-6">
        <h1> Products List </h1>
        </div>
        <div class="col-md-6 text-right">
        <a href="{{url('Prodcuts/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Product</a>
        </div>
    </div>
    <div class="card shadow mb-4">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Cost Price</th>
                                            <th>Price</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $Products as $Product)
                                        <tr>
                                            <td>{{ $Product->id}}</td>
                                            <td>{{ $Product->category_id}}</td>
                                            <td>{{ $Product->title}}</td>
                                            <td>{{ $Product->descrition}}</td>
                                            <td>{{ $Product->cost_price}}</td>
                                            <td>{{ $Product->price}}</td>
                                            <td>{{ $Product->unit}}</td>
                                            <td class="text-right">

                                                <form action="{{route('Products.destroy',['Product' => $Product->id])}}" method="post">
                                                @csrf

                                                    <a class="btn btn-primary btn-sm" href="{{ route('Products.show', ['Product' => $Product->id]) }}"> 
			              	 	                   <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('Products.edit', ['Product' => $Product->id]) }}"> 
			              	 	                   <i class="fa fa-edit"></i>
                                                    </a>
                        
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