<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Group;

class UserGroupsController extends Controller
{
   public function index(){

       $this->data['groups'] = Group::all();

       return view('groups.groups',$this->data);

   }

   public function create(){
       return view('groups.create');
   }
   
   public function store(Request $requst){

    $formData = new Group();
    $formData->title = $requst->title;
    $formData->save();
    if($formData){
        Session::flash('message', 'Group Created Successfully!');
    }else{
        Session::flash('message', 'Not Found');
    }
    return redirect()->to('groups');

   }

   public function delete($id){
       $formDelete = Group::find($id);
       $formDelete->delete();
       if($formDelete){
        Session::flash('message', 'Group Deleted Successfully!');  
       }else{
        Session::flash('message', 'Not Deleted');
       }
       return redirect()->to('groups');
   }

}
