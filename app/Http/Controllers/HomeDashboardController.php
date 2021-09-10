<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Receipt;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use App\Models\Purchese_item;

class HomeDashboardController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Dashboard';
    }
    public function index(){

       $this->data['totalUsers']        = User::count('id');
       $this->data['totalProducts']     = Product::count('id');
       $this->data['totalSales']        = SaleItem::sum('total');
       $this->data['totalPurchases']    = Purchese_item::sum('total');
       $this->data['totalReceipts']     = Receipt::sum('amount');
       $this->data['totalPayments']     = Payment::sum('amount');
       $this->data['totalStocks']       = Purchese_item::sum('quantity') - SaleItem::sum('quantity');
        
        return view('dashboard',$this->data);
    }
}
