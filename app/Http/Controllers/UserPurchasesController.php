<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Purchese_invoice;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Session;

class UserPurchasesController extends Controller
{
    public function __construct(){

        $this->data['tab_menu'] = 'purchases';
    }

    public function index($id){
        $this->data['user'] = User::findOrFail($id);
        
        return view('users.purchases.purchases',$this->data);
    }
}
