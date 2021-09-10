
@extends('users.user_layout')
@section("user_card")
<div class="row">
            <!-- Total Sales Card Example -->
            <div class="col-xl-2 col-md-3 mb-4"></div>
            <div class="col-xl-2 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Sales
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    
                                        $totalSales = 0;
                                        foreach($user->sales as $sale){
                                            $totalSales += $sale->items->sum('total');
                                        }
                                        echo $totalSales;
                                    
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-200"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Purchase Card Example -->
            <div class="col-xl-2 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                  Purchases
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    
                                        $totalPurchase = 0;
                                        foreach($user->purchases as $purchase){
                                            $totalPurchase += $purchase->items->sum('total');
                                        }
                                        echo $totalPurchase;
                                    
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-200"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Total Receipts Card Example -->
            <div class="col-xl-2 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Receipts
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{$totalReceipt = $user->receipts()->sum('amount')}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-200"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Total Payments Card Example -->
            <div class="col-xl-2 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                   Payments
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$totalPayment = $user->payments()->sum('amount')}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Total Blance Card Example -->
            <div class="col-xl-2 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                     Blances
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{($totalPurchase + $totalReceipt) - ($totalSales + $totalPayment)}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('user_content')
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
                </div>
@stop