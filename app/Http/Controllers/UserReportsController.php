<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receipt;
use App\Models\Payment;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use App\Models\Purchese_item;
use Illuminate\Support\Facades\DB;

class UserReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['tab_menu'] = 'reports';
    }

    public function reports($id){

        $this->data['user']    = User::findOrFail($id);


            $this->data['sales'] = SaleItem::select('products.id',DB::raw('sum(sale_items.quantity) as quantity,AVG(sale_items.price) as price,sum(sale_items.total) as total'))
                    ->join('products','sale_items.product_id', '=','products.id')
                    ->join('sale_invioces','sale_items.sale_invioce_id','=','sale_invioces.id')
                    ->where('products.has_stock',1)
                    ->where('sale_invioces.user_id',$id)
                    ->groupBy('products.id')
                    ->get();

            $this->data['purchases'] = Purchese_item::select('products.id',DB::raw('sum(purchese_items.quantity) as quantity,AVG(purchese_items.price) as price,sum(purchese_items.total) as total'))
                    ->join('products','purchese_items.product_id', '=','products.id')
                    ->join('purchese_invoices','purchese_items.purchese_invoice_id','=','purchese_invoices.id')
                    ->where('products.has_stock',1)
                    ->where('purchese_invoices.user_id',$id)
                    ->groupBy('products.id')
                    ->get();

            $this->data['receipts'] = Receipt::select('date', DB::raw('SUM(amount) as amount') )
                    ->groupBy('date')
                    ->where('user_id', $id)
                    ->get();   

            $this->data['payments'] = Payment::select('date', DB::raw('SUM(amount) as amount') )
                    ->groupBy('date')
                    ->where('user_id', $id)
                    ->get();

       return view('users.reports.user_reports',$this->data);
    }

}
