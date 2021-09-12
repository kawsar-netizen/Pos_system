<?php

namespace App\Http\Controllers\Reports;

use App\Models\Payment;
use App\Models\Receipt;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use App\Models\Purchese_item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DayReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Days';

    }

    public function index(Request $request){
        $startDate   = $this->data['start_date']     = $request->get('start_date',date('Y-m-d'));

        $endDate     = $this->data['end_date']      = $request->get('end_date',date('Y-m-d'));
 
         $this->data['sales'] = SaleItem::select('products.id',DB::raw('sum(sale_items.quantity) as quantity,AVG(sale_items.price) as price,sum(sale_items.total) as total'))
                             ->join('products','sale_items.product_id', '=','products.id')
                             ->join('sale_invioces','sale_items.sale_invioce_id','=','sale_invioces.id')
                             ->whereBetween('sale_invioces.date',[$startDate, $endDate])
                             ->where('products.has_stock',1)
                             ->groupBy('products.id')
                             ->get();

        $this->data['purchases'] = Purchese_item::select('products.id',DB::raw('sum(purchese_items.quantity) as quantity,AVG(purchese_items.price) as price,sum(purchese_items.total) as total'))
                             ->join('products','purchese_items.product_id', '=','products.id')
                             ->join('purchese_invoices','purchese_items.purchese_invoice_id','=','purchese_invoices.id')
                             ->whereBetween('purchese_invoices.date',[$startDate, $endDate])
                             ->where('products.has_stock',1)
                             ->groupBy('products.id')
                             ->get();



        // $this->data['payments'] = Payment::select('users.name', 'users.phone', DB::raw('SUM(payments.amount) as amount') )
        //                      ->join('users', 'payments.user_id', '=', 'users.id')
        //                      ->whereBetween('date', [ $this->data['start_date'], $this->data['end_date'] ])
        //                      ->groupBy('user_id')
        //                      ->get();

        // $this->data['receipts'] = Receipt::select('users.name', 'users.phone', DB::raw('SUM(receipts.amount) as amount') )
        //                         ->join('users', 'receipts.user_id', '=', 'users.id')
        //                         ->whereBetween('date', [ $this->data['start_date'], $this->data['end_date'] ])
        //                         ->groupBy('user_id')
        //                         ->get(); 

        $this->data['payments'] = Payment::whereBetween('date',[$startDate, $endDate])
                                    ->get();

        
        $this->data['receipts'] = Receipt::whereBetween('date',[$startDate, $endDate])
                                    ->get();

 
         return view('reports.days',$this->data);
 
    }
}
