
@extends('users.user_layout')
@section('user_content')

<div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sales Invoice Details</h6>
                    </div>
                        <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5 text-left">
                                        <div> <strong>Customer :</strong> {{$user->name}}</div>
                                        <div> <strong>Email :</strong> {{$user->email}}</div>
                                        <div> <strong>Phone :</strong> {{$user->phone}}</div>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <div> <strong>Date :</strong> {{$invoice->date}}</div>
                                        <div><strong>Challan No :</strong> {{$invoice->challan_no}}</div>
                                    </div>
                                    <div class='invoice_item'>
                                    <table class="table">
                                        <thead>
                                            <th>SL</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($invoice->items as $key=> $item)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{optional($item->product)->title}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->total}}</td>
                                                <td class="text-right">
                                                <form action="{{route('users.destroy',['user' => $user->id])}}" method="post">
                                                @csrf
                                                      @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                                        <i class="fa fa-trash"></i>  
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct">
                                                        <i class="fa fa-plus"></i> Add Product 
                                                </button>
                                                </th>
                                                <th colspan="2" class="text-right">Total :</th>
                                                <th>{{$invoice->items->sum('total')}}</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>

        <!-- Add a new Product Modal -->
        <!-- modal -->
        <div class="modal fade" id="newProduct" tabindex="-1" role="dialog"aria-labelledby="newProductModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.sales.invoice.addItems', $user->id,$invoice->id], 'method' => 'post' ]) !!}
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newProductModalLabel"> Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

	      <div class="modal-body">	
				  <div class="form-group row">
				    <label for="date" class="col-md-12 col-form-label"> Product<span class="text-danger">*</span> </label>
				    <div class="col-sm-9">
				      {{ Form::select('product_id', $products, NULL, [ 'class'=>'form-control', 'id' => 'product', 'placeholder' => 'Select Product', 'required' ]) }}
				    </div>
				  </div>

		    	  <div class="form-group row">
				    <label for="price" class="col-md-12 col-form-label">Unit Price<span class="text-danger">*</span> </label>
				    <div class="col-sm-9">
				      {{ Form::text('price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'placeholder' => 'Price' ,'required']) }}
				    </div>
				  </div>
		    	  <div class="form-group row">
				    <label for="price" class="col-md-12 col-form-label">Quantity<span class="text-danger">*</span> </label>
				    <div class="col-sm-9">
				      {{ Form::text('quantity', NULL, [ 'class'=>'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity', 'required']) }}
				    </div>
				  </div>
		    	  <div class="form-group row">
				    <label for="total" class="col-md-12 col-form-label">Total<span class="text-danger">*</span> </label>
				    <div class="col-sm-9">
				      {{ Form::text('total', NULL, [ 'class'=>'form-control', 'id' => 'total', 'placeholder' => 'Total', 'required']) }}
				    </div>
				  </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>	
	      </div>
	    </div>
	    {!! Form::close() !!}
	  </div>
	</div>
@stop