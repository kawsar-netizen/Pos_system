<?php

namespace App\Http\Controllers\reports;

use Illuminate\Http\Request;
use App\Models\Purchese_item;
use App\Http\Controllers\Controller;

class ReportPurchasesController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Purchases';

    }

    public function index(Request $request){

        $startDate   = $this->data['start_date']     = $request->get('start_date',date('Y-m-d'));
 
        $endDate     = $this->data['end_date']      = $request->get('end_date',date('Y-m-d'));
 
        $this->data['purchases'] = Purchese_item::SELECT('purchese_items.quantity','purchese_items.price','purchese_items.total','products.title','purchese_invoices.challan_no','purchese_invoices.date')
                             ->join('products','purchese_items.product_id', '=','products.id')
                             ->join('purchese_invoices','purchese_items.purchese_invoice_id','=','purchese_invoices.id')
                             ->whereBetween('purchese_invoices.date',[$startDate, $endDate])
                             ->get();
 
         return view('reports/purchases',$this->data);
 
     }
}
