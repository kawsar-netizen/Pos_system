<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();

        return view('category.categories',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::all();

        $this->data['headline']   = 'Add new category';

        $this->data['mode']   = 'Create';

        $this->data['botton']   = 'Add Category';

        return view('category.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $formDate = $request->all();
        $formDate = Category::create($formDate);
        if($formDate){
            Session::flash('message', $formDate['title'] . ' Added Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('categories');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category'] = Category::findOrFail($id);

        $this->data['mode'] = 'edit';

        $this->data['headline'] = 'Update Information';

        $this->data['botton'] = 'Update';

        return view('category.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->all();
        $category  = Category::findOrFail($id);
        $category->title = $data['title'];
        $category->save();
        if($category){
            Session::flash('message', 'Category Updated Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('categories');
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataDelete = Category::findOrFail($id);
        $dataDelete->delete();
        if($dataDelete){
            Session::flash('message', 'Category Deleted Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('categories');
        }
    }

