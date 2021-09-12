@extends('users.user_layout')
@section('user_content')
<div class="card shadow mb-4">
        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> 
                                <strong> 
                                Sales Report
                                </strong>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm table-striped" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Price</th>
                                            <th class="text-right">Total</th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        @foreach( $sales as $sale)
                                        <tr>
                                            <td>{{ $sale->title}}</td>
                                            <td class="text-right">{{ $sale->quantity}}</td>
                                            <td class="text-right">{{ number_format($sale->price,2)}}</td>
                                            <td class="text-right">{{number_format($sale->total,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                            <th class="text-right">TotalItems: </th>
                                            <th class="text-right">{{$sales->sum('quantity') }}</th>
                                            <th class="text-right">Total: </th>
                                            <th class="text-right">
                                                {{number_format($sales->sum('total'),2)}}
                                            </th>                                  
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                                        <!-- purchases reports table -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> 
                            <strong> 
                                Purchases Report 
                            </strong>
                        </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-sm" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Price</th>
                                            <th class="text-right">Total</th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        @foreach( $purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->title}}</td>
                                            <td class="text-right">{{ $purchase->quantity}}</td>
                                            <td class="text-right">{{number_format($purchase->price,2)}}</td>
                                            <td class="text-right">{{ number_format($purchase->total,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                            <th class="text-right">TotalItems: </th>
                                            <th class="text-right">{{$purchases->sum('quantity') }}</th>
                                            <th class="text-right">Total: </th>
                                            <th class="text-right">
                                                {{number_format($purchases->sum('total'),2)}}
                                            </th>                                  
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
    <!-- Payments Report -->
    <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Payments Report </strong></h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-striped table-borderless table-sm" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th>Date</th>
		              <th class="text-right">Total</th>
		            </tr>
		          </thead>
		          
		          <tbody>
		          	@foreach ($payments as $payment)
			            <tr>
			              <td> {{ $payment->date }} </td>
			              <td class="text-right"> {{ number_format($payment->amount, 2) }} </td>
			            </tr>
		            @endforeach
		          </tbody>

		          <tfoot>
		            <tr>
		              <th>Total</th>
		              <th class="text-right"> {{ number_format($user->payments()->sum('amount'), 2) }} </th>
		            </tr>
		          </tfoot>
		        </table>
		    </div>
	    </div>
  	</div>
  	
     <!-- Receipt Reports -->
     <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Receipts Report </strong></h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-striped table-borderless table-sm" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th>Date</th>
		              <th class="text-right">Total</th>
		            </tr>
		          </thead>
		          
		          <tbody>
		          	@foreach ($receipts as $receipt)
			            <tr>
			              <td> {{ $receipt->date }} </td>
			              <td class="text-right"> {{ number_format($receipt->amount, 2) }} </td>
			            </tr>
		            @endforeach
		          </tbody>

		          <tfoot>
		            <tr>
		              <th>Total</th>
		              <th class="text-right"> {{ number_format($user->receipts()->sum('amount'), 2) }} </th>
		            </tr>
		          </tfoot>
		        </table>
		    </div>
	    </div>
  	</div>

		          

                        
@stop