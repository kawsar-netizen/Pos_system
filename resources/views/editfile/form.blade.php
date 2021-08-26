@extends('layout.main')
@section('main_content')

<div class="row clearfix page_header">
    <div class="col-md-6">
        {{$headline}}
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
                    {!! Form::model($user,['route' => 'update',$user->id,'method'=>'put']) !!}
                @else
                    {!! Form::open(['route' => 'store','method'=>'post']) !!}
                @endif
                <div class="form-group">
                <label for="title">User Group<span class="text-danger">*</span></label>
                   {{Form::select('group_id', $groups ,Null,['class'=>'form-control','id'=>'group','placeholder'=>'Select Group'])}}
                </div>
                <div class="form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                    <!-- <input type="name" class="form-control" name='name' placeholder="Enter Your name"> -->
                {{Form::text('name',Null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter Your name'])}}
                </div>
                <div class="form-group">
                <label for="phone"> Phone <span class="text-danger">*</span></label>
                    <!-- <input type="phone" class="form-control" name='phone' placeholder="Enter Your Phone number"> -->
                    {{Form::text('phone',Null,['class'=>'form-control','id'=>'phone','placeholder'=>'Enter Your phone number'])}}

                </div>
                <div class="form-group">
                <label for="email">Email</label>
                    <!-- <input type="email" class="form-control" name='email' placeholder="Enter Your email"> -->
                    {{Form::text('email',Null,['class'=>'form-control','id'=>'email','placeholder'=>'Enter Your email'])}}

                </div>
                <div class="form-group">
                <label for="title">Address</label>
                    <!-- <input type="address" class="form-control" name='address' placeholder="Enter Your Address"> -->
                    {{Form::text('address',Null,['class'=>'form-control','id'=>'address','placeholder'=>'Enter Your address'])}}

                </div>
            <button type="submit" class="btn btn-primary">Add User</button>
            {!! Form::close() !!}
            </div>
        </div>
        </div>

</div>
@endsection