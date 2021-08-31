@extends('users.user_layout')
@section('user_content')

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{$user->name}}</strong></h6>
                    </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Collected By</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Note</th>
                                            <th class='text-right'>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                        <th class="text-right" colspan="3">Total :</th>
                                        <th class="text-left">{{$user->receipts->sum('amount')}}</th>
                                        <th colspan="3"></th>
                                      </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach( $user->receipts as $receipt)
                                        <tr>
                                            <td>{{ $user->name}}</td>
                                            <td>{{($receipt->admin_id) ? $receipt->admin->name : ""}}</td>
                                            <td>{{ $receipt->date}}</td>
                                            <td>{{ $receipt->amount}}</td>
                                            <td>{{ $receipt->note}}</td>
                                            <td class="text-right">

                                                <form action="{{route('user.receipts.destroy',['id' => $user->id,'receipt_id' => $receipt->id])}}" method="post">
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
                                </table>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
@stop

