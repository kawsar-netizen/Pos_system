<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Products';
        $this->data['sub_menu'] = 'Stocks';
    }

    public function index(){

        $this->data['Products'] = Product::all();
        
        return view('products.stocks',$this->data);
    }
}
