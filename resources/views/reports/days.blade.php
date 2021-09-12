@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
        <div class="col-md-4">
        <h1> Day Reports </h1>
        </div>
        <div class="col-md-8 text-right">
        {!! Form::open([ 'route' => ['reports.days'], 'method' => 'get' ]) !!}
         <div class="form-row align-items-center">
            <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Start Date</label>
            <div class="input-group mt-2">
            {{ Form::date('start_date', $start_date, [ 'class'=>'form-control', 'id' => 'start_date', 'placeholder' => 'Start Date']) }}
            </div>
            </div>
            <div class="col-auto">
            <label class="sr-only" for="inlineFormInputGroup">End Date</label>
            <div class="input-group mt-2">
            {{ Form::date('end_date', $end_date, [ 'class'=>'form-control', 'id' => 'end_date', 'placeholder' => 'End Date']) }}
            </div>
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
         </div>
         {!! Form::close() !!}
        </div>
    </div>

    <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Sales
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{number_format($sales->sum('total'),2)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Purchases
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{number_format($purchases->sum('total'),2)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Payments
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{number_format($payments->sum('amount'),2)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Receipts
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{number_format($receipts->sum('amount'),2)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <strong> Sales Report From {{$start_date}} to {{$end_date}} </strong></h6>
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
                            <h6 class="m-0 font-weight-bold text-primary"> <strong> Purchases Report From {{$start_date}} to {{$end_date}} </strong></h6>
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
                            <h6 class="m-0 font-weight-bold text-primary"> <strong> Payments Report From {{$start_date}} to {{$end_date}} </strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm table-striped" cellspacing="0">
                                    <thead>
                                        <tr>
                                          
                                            <th>User</th>
                                            <th class="text-right">Amount</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        @foreach( $payments as $payment)
                                        <tr>
                                            
                                            <td>{{ optional($payment->user)->name}}</td>
                                            <td class="text-right">{{number_format( $payment->amount,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                           
                                            <th class="text-right">Total:</th>
                                            <th class="text-right">
                                                {{number_format($payments->sum('amount'),2)}}
                                            </th>                                  
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
     <!-- Receipt Reports -->
       
<div class="card shadow mb-4">
        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <strong> Receipts Report From {{$start_date}} to {{$end_date}} </strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm table-striped" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th class="text-right">Amount</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        @foreach( $receipts as $receipt)
                                        <tr>
                                            <td>{{optional($receipt->user)->name}}</td>
                                            <td class="text-right">{{number_format($receipt->amount,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                            <th class="text-right">Total:</th>
                                            <th class="text-right">
                                                {{number_format($receipts->sum('amount'),2)}}
                                            </th>                                  
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

@stop