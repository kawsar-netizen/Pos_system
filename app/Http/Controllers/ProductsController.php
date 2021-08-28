<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['Products'] = Product::all();

        return view('products.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::arrayForSelect();

        $this->data['headline']   = 'Add new product';

        $this->data['mode']       = 'create';

        $this->data['botton']     =  'Add Product';

        return view('products.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $formData =  $request->all();

        $formData = Product::create($formData);

        if($formData){
            Session::flash('message', 'Product Created Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('Products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product']  = Product::findOrFail($id);

        return view('products.show',$this->data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product'] = Product::findOrFail($id);

        $this->data['categories'] = Category::arrayForSelect();


        $this->data['mode']  = 'edit';

        $this->data['headline']  = 'Update Information';

        $this->data['botton']  = 'Update';

     return view('products.form',$this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product->category_id = $data['category_id'];
        $product->title = $data['title'];
        $product->descrition = $data['descrition'];
        $product->cost_price = $data['cost_price'];
        $product->price = $data['price'];
        $product->unit = $data['unit'];
        $product->save();
        if($product){
            Session::flash('message', 'Product Updated Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('Products');
        }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = Product::findOrFail($id);
        $productDelete->delete();
        if($productDelete){
            Session::flash('message', 'Product Deleted Successfully!'); 
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('Products');
    }
}
