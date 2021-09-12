@extends('layout.main')
@section('main_content')


<div class="row">

<!-- Total Stocks Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Stocks
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalStocks}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Products (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Products
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalProducts}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Sales(Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Sales
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalSales}}</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Purchases Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Purchases
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPurchases}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">

<!-- Total Users Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Users
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalUsers}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Receipts Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Receipts
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalReceipts}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Payments (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Payments
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPayments}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cash In Hand (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Cash In Hand 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReceipts - $totalPayments }}</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-wallet fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@stop