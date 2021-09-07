<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Session;

class UserPaymentsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['tab_menu']  = 'payments';
    }

    public function index($id){

        $this->data['user'] = User::findOrFail($id);

        return view('users.payments.payment',$this->data);
        
    }

    public function store(PaymentRequest $request , $user_id,$invoice_id = null){

        $formData =  $request->all();

        $formData['user_id'] = $user_id;

        $formData['admin_id'] = Auth::id();

        if($invoice_id){
            $formData['purchese_invoice_id'] = $invoice_id;
        }

        $formData = Payment::create($formData);

        if($formData){
            Session::flash('message', 'Payment Added Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        if($invoice_id){
            return redirect()->route('user.purchases.PurchaseinvoiceDetails', ['id' => $user_id,'invoice_id'=> $invoice_id]);
        }else{
            return redirect()->route('users.show',['user'=> $user_id]);
        }
}

    public function destroy($user_id,$payment_id){
        $formData = Payment::findOrFail($payment_id);
        $formData->delete();
        if($formData){
            Session::flash('message', 'Payment Deleted Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->route('user.payments',['id'=> $user_id]);

    }
}
