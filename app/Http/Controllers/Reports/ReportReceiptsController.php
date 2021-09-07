<?php

namespace App\Http\Controllers\Reports;

use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportReceiptsController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Receipts';

    }

    public function index(Request $request){

        $startDate   = $this->data['start_date']     = $request->get('start_date',date('Y-m-d'));
 
        $endDate     = $this->data['end_date']      = $request->get('end_date',date('Y-m-d'));
 
             $this->data['receipts'] = Receipt::whereBetween('date',[$startDate, $endDate])
                                            ->get();
 
         return view('reports/receipts',$this->data);
 
     }
}
