@extends('users.user_layout')
@section('user_content')

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{$user->name}}</strong></h6>
                    </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Challan NO</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Items</th>
                                            <th>Total</th>
                                            <th class='text-right'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totalItem = 0;
                                            $grandtotal = 0;

                                        ?>
                                    @foreach( $user->sales as $sale)
                                        <tr>
                                            <td>{{ $sale->challan_no}}</td>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $sale->date}}</td>
                                            <td>
                                                <?php
                                                    $ItemQyt = $sale->items->sum('quantity');
                                                    $totalItem += $ItemQyt;
                                                    echo $totalItem;
                                                ?>
                                            </td>
                                            <td>
                                            <?php
                                                    $total = $sale->items->sum('total');
                                                    $grandtotal += $total;
                                                    echo $grandtotal;
                                                ?>
                                                
                                            </td>
                                            <td class="text-right">

                                                <form action="{{route('user.sales.destroy',['id' => $user->id,'invoice_id'=>$sale->id])}}" method="post">

                                              
                                                    <a class="btn btn-primary btn-sm" href="{{ route('user.sales.SaleinvoiceDetails', ['id' => $user->id,'invoice_id'=> $sale->id])}}"> 
			              	 	                   <i class="fa fa-eye"></i>
                                                    </a>
                                                    @if($ItemQyt == 0)
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                                        <i class="fa fa-trash"></i>  
                                                    </button>
                                                @endif
                                                </form>

                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th class="text-right" colspan="4">{{$totalItem }}</th>
                                        <th colspan="1">{{$grandtotal}}</th>
                                        <th></th>
                                    </tfoot>
                                </table>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
@stop