<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\SaleInvioce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InvoiceProductRequest;

class UserSalesController extends Controller
{

    public function __construct(){
        
        $this->data['tab_menu'] = 'sales';
    }
    public function index($id){
        
        $this->data['user']    = User::findOrFail($id);


       return view('users.sales.sales',$this->data);
    }

    public function createInvoice(InvoiceRequest $request,$user_id){
        $formData =  $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();
        $formData = SaleInvioce::create($formData);
        if($formData){
            Session::flash('message','Sale Invoice Created Successfull!');
        }else{
            Session::flash('message','Not Found');
        }
        return redirect()->route('user.sales',['id'=>$user_id]);
    }

    public function SaleinvoiceDetails($user_id,$invoice_id){
      $this->data['user'] = User::findOrFail($user_id);
      $this->data['invoice'] = SaleInvioce::findOrFail($invoice_id);

        $this->data['products'] = Product::arrayForSelect();
      
      return view('users.sales.invoice',$this->data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id,$invoice_id){

        $formData = $request->all();

        $formData['sale_invioce_id'] = $invoice_id;

        $formData['user_id'] = $user_id;

        $formData = SaleItem::create($formData);

        if($formData){
            Session::flash('message','Item Added Successfull!');
        }else{
            Session::flash('message','Not Found');
        }
        
        return redirect()->route('user.sales.SaleinvoiceDetails', ['id' => $user_id,'invoice_id'=> $invoice_id]);
    }

    public function destroy($user_id,$invoice_id,$item_id){

        $formData = SaleItem::findOrFail($item_id);
        $formData->delete();

        if($formData){
            Session::flash('message','Item Deleted Successfull!');
        }else{
            Session::flash('message','Not Found');
        }

        return redirect()->route('user.sales.SaleinvoiceDetails', ['id' => $user_id,'invoice_id'=> $invoice_id]);
    }

    public function sales_destroy($user_id,$invoice_id){

        $formData = SaleInvioce::findOrFail($invoice_id);

        $formData->delete();

        if($formData){
            Session::flash('message','Invoice Deleted Successfull!');
        }else{
            Session::flash('message','Not Found');
        }

        return redirect()->route('user.sales', ['id' => $user_id]);

    }

}
