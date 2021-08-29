<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users']        = User::all();

        return view('users.users',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']       = Group::arrayForSelect();

        $this->data['mode']         = 'create';

        $this->data['headline']     = 'Add New User';

        $this->data['botton']     = 'Add User';
        
        return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $formData = $request->all();
        $formData = User::create($formData);
        if($formData){
            Session::flash('message', 'User Created Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('users');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = User::findOrFail($id);

        $this->data['tab_menu'] = 'user-info';

        return view('users.show',$this->data);
    }
    public function edit($id)
    {
        $this->data['user']         = User::findOrFail($id);

        $this->data['groups']       = Group::arrayForSelect();

        $this->data['mode']         = 'edit';

        $this->data['headline']     = 'Update Information';

        $this->data['botton']     = 'Update';

        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data               = $request->all();
        $user               = User::findOrFail($id);
        $user->group_id     = $data['group_id'];
        $user->name         = $data['name'];
        $user->phone        = $data['phone'];
        $user->email        = $data['email'];
        $user->address      = $data['address'];
        $user->save();

        if($user){
            Session::flash('message', 'User Updated Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }

        return redirect()->to('users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formDelete    = User::findOrFail($id);

        $formDelete->delete();
        
        if($formDelete){
            Session::flash('message', 'User Deleted Successfully!');
        }else{
            Session::flash('message', 'Not Found');
        }
        return redirect()->to('users');

    }
}
