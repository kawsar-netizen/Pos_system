<?php

namespace App\Http\Controllers\Reports;

use App\Models\SaleItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportSalesController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Sales';

    }

    public function index(Request $request){

       $startDate   = $this->data['start_date']     = $request->get('start_date',date('Y-m-d'));

       $endDate     = $this->data['end_date']      = $request->get('end_date',date('Y-m-d'));

        $this->data['sales'] = SaleItem::SELECT('sale_items.quantity','sale_items.price','sale_items.total','products.title','sale_invioces.challan_no','sale_invioces.date')
                            ->join('products','sale_items.product_id', '=','products.id')
                            ->join('sale_invioces','sale_items.sale_invioce_id','=','sale_invioces.id')
                            ->whereBetween('sale_invioces.date',[$startDate, $endDate])
                            ->get();

        return view('reports/sales',$this->data);

    }
}
