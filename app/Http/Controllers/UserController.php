<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index(){
        $this->data['users'] = User::all();
        return view('users.users',$this->data);
    }

    public function create(){

        $this->data['groups'] = Group::arrayForSelect();

        return view('users.usercreate',$this->data);
    }

    public function user_store(CreateUserRequest $request){
        $userAdd = new User();
        $userAdd->name = $request->name;
        $userAdd->email = $request->email;
        $userAdd->phone = $request->phone;
        $userAdd->address = $request->address;
        $userAdd->save();
        // $data = $request->all();
        if($userAdd){
            Session::flash('message', 'User Created Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('users');
        }

        public function user_edit($id){
            
        }
    }

