@extends('layout.main')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
    <h1>    <a href="{{route('users.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Back</a>
            {{$headline}}</h1>
    </div>
</div>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$headline}}</h6>
        </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">

                @if($mode == 'edit')
                {!! Form::model($user,['route' => ['users.update',$user->id],'method' => 'put']) !!}

                @else
                {!! Form::open(['route' => ['users.store'],'method' => 'post']) !!}
                @endif

                <div class="form-group">
                <label for="group">User Group<span class='text-danger'>*</span></label>
                {{Form::select('group_id',$groups,Null,['class'=>'form-control','id'=>'group','placeholder'=>'User Group'])}}                   
                 <!-- <input type="group" class="form-control" name='group' placeholder="User group"> -->
                </div>
                
                <div class="form-group">
                <label for="name">Name<span class='text-danger'>*</span></label>
                  {{Form::text('name',Null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter Your name'])}}
                  <!-- <input type="name" class="form-control" name='name' placeholder=" Enter user name"> -->
                </div>
                
                <div class="form-group">
                <label for="phone">Phone<span class='text-danger'>*</span></label>
                {{Form::text('phone',Null,['class'=>'form-control','id'=>'phone','placeholder'=>'Enter Your phone number'])}}
                    <!-- <input type="phone" class="form-control" name='phone' placeholder="Enter user email"> -->
                </div>
               
                <div class="form-group">
                <label for="email">Email</label>
                {{Form::text('email',Null,['class'=>'form-control','id'=>'email','placeholder'=>'Enter Your email'])}}
                    <!-- <input type="email" class="form-control" name='email' placeholder="Enter user phone"> -->
                </div>
                
                <div class="form-group">
                <label for="address">Address</label>
                {{Form::text('address',Null,['class'=>'form-control','id'=>'address','placeholder'=>'Enter Your address'])}}
                    <!-- <input type="address" class="form-control" name='address' placeholder="Enter user address"> -->
                </div>

            <button type="submit" class="btn btn-primary">{{$botton}}</button>

            {!! Form::close() !!}
            </div>
        </div>
        </div>

</div>
@stop