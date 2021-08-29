<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receipt;
use Illuminate\Http\Request;
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

    public function store(ReceiptRequest $request, $user_id){

        $formData =  $request->all();

        $formData['user_id'] = $user_id;

        $formData = Receipt::create($formData);

        if($formData){
            Session::flash('message', 'Receipt Added Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->route('user.receipts',['id'=> $user_id]);
    }
    public function destroy($user_id,$receipt_id){
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
