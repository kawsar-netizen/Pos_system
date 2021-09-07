<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Purchese_item;
use App\Models\Purchese_invoice;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InvoiceProductRequest;

class UserPurchasesController extends Controller
{
    public function __construct(){
        
        parent::__construct();
        $this->data['tab_menu'] = 'purchases';
    }

    public function index($id){
        $this->data['user'] = User::findOrFail($id);
        
        return view('users.purchases.purchases',$this->data);
    }

    public function createInvoice(InvoiceRequest $request ,$user_id){

        $formDate =  $request->all();
        $formDate['user_id'] = $user_id;
        $formDate['admin_id'] = Auth::id();
        $formDate = Purchese_invoice::create($formDate);
        if($formDate){
            Session::flash('message','Purchase Invoice Created Successfull!');
        }else{
            Session::flash('message','Not Found');
        }
        return redirect()->route('user.purchases',['id'=>$user_id]);
    }

    public function PurchaseinvoiceDetails($user_id,$invoice_id){

        $this->data['user'] = User::findOrFail($user_id);

        $this->data['invoice'] = Purchese_invoice::findOrFail($invoice_id);

        $this->data['totalpayable'] = $this->data['invoice']->items->sum('total');

        $this->data['totalpaid'] = $this->data['invoice']->payments->sum('amount');
  
        $this->data['products'] = Product::arrayForSelect();
        
        return view('users.purchases.invoice',$this->data);
      }

      public function addItem(InvoiceProductRequest $request, $user_id,$invoice_id){

        $formData = $request->all();
        
        $formData['purchese_invoice_id'] = $invoice_id;

        $formData['user_id'] = $user_id;

        $formData = Purchese_item::create($formData);

        if($formData){
            Session::flash('message','Item Added Successfull!');
        }else{
            Session::flash('message','Not Found');
        }
        
        return redirect()->route('user.purchases.PurchaseinvoiceDetails', ['id' => $user_id,'invoice_id'=> $invoice_id]);
    }

    public function destroy($user_id,$invoice_id,$item_id){

        $formData = Purchese_item::findOrFail($item_id);
        $formData->delete();

        if($formData){
            Session::flash('message','Item Deleted Successfull!');
        }else{
            Session::flash('message','Not Found');
        }

        return redirect()->route('user.purchases.PurchaseinvoiceDetails', ['id' => $user_id,'invoice_id'=> $invoice_id]);
    }

    public function purchases_destroy($user_id,$invoice_id){

        $formData = Purchese_invoice::findOrFail($invoice_id);

        $formData->delete();

        if($formData){
            Session::flash('message','Invoice Deleted Successfull!');
        }else{
            Session::flash('message','Not Found');
        }

        return redirect()->route('user.purchases', ['id' => $user_id]);

    }
}
