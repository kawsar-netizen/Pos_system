<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReceiptRequest;
use Illuminate\Support\Facades\Session;

class UserReceiptsController extends Controller
{
    public function __construct(){

        $this->data['tab_menu'] = 'receipts';
 
    }

    public function index($id){
        $this->data['user'] = User::findOrFail($id);
        
        return view('users.receipts.receipt',$this->data);
    }

    public function store(ReceiptRequest $request, $user_id, $invoice_id = null){

        $formData =  $request->all();

        $formData['user_id'] = $user_id;

        $formData['admin_id'] = Auth::id();

        if($invoice_id){
            $formData['sale_invioce_id'] = $invoice_id;
        }

        $formData = Receipt::create($formData);

        if($formData){
            Session::flash('message', 'Receipt Added Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        if($invoice_id){
            return redirect()->route('user.sales.SaleinvoiceDetails', ['id' => $user_id,'invoice_id'=> $invoice_id]);
        }else{
            return redirect()->route('users.show',['user'=> $user_id]);
        }
    }

    public function destroy($user_id, $receipt_id){

        $formData = Receipt::findOrFail($receipt_id);

        $formData->delete();

        if($formData){
            Session::flash('message', 'Receipt Deleted Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }

        return redirect()->route('user.receipts',['id'=> $user_id]);
    }
}
