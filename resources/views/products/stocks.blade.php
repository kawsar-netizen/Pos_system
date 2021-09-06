@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
        <div class="col-md-6">
        <h1> Products Stock </h1>
        </div>
    </div>
    <div class="card shadow mb-4">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Stocks Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Purchases</th>
                                            <th>Sales</th>
                                            <th>Stocks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $Products as $Product)
                                        <tr>
                                            <td>{{ $Product->id }}</td>
                                            <td>{{ optional($Product->category)->title }}</td>
                                            <td>{{ $Product->title }}</td>
                                            <td>{{ $purchase =  $Product->purchaseItems->sum('quantity') }}</td>
                                            <td>{{ $sale = $Product->saleItems->sum('quantity') }}</td>
                                            <td>{{ $purchase - $sale }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@stop