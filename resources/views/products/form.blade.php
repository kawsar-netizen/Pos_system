@extends('layout.main')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
    <h1>    <a href="{{route('Products.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Back</a>
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
                {!! Form::model($product,['route' => ['Products.update',$product->id],'method' => 'put']) !!}

                @else
                {!! Form::open(['route' => ['Products.store'],'method' => 'post']) !!}
                @endif

                <div class="form-group">
                <label for="group">Category<span class='text-danger'>*</span></label>
                {{Form::select('category_id',$categories,Null,['class'=>'form-control','id'=>'category','placeholder'=>'Category'])}}                   
                 <!-- <input type="group" class="form-control" name='group' placeholder="User group"> -->
                </div>
                
                <div class="form-group">
                <label for="title">Title<span class='text-danger'>*</span></label>
                  {{Form::text('title',Null,['class'=>'form-control','id'=>'title','placeholder'=>'Title'])}}
                  <!-- <input type="name" class="form-control" name='name' placeholder=" Enter user name"> -->
                </div>
                
                <div class="form-group">
                <label for="description">Description</span></label>
                {{Form::text('descrition',Null,['class'=>'form-control','id'=>'descrition','placeholder'=>'Description'])}}
                    <!-- <input type="phone" class="form-control" name='phone' placeholder="Enter user email"> -->
                </div>
               
                <div class="form-group">
                <label for="cost_price">Cost Price<span class='text-danger'>*</label>
                {{Form::text('cost_price',Null,['class'=>'form-control','id'=>'cost_price','placeholder'=>'Cost Price'])}}
                    <!-- <input type="email" class="form-control" name='email' placeholder="Enter user phone"> -->
                </div>
                
                <div class="form-group">
                <label for="price">Price<span class='text-danger'>*</label>
                {{Form::text('price',Null,['class'=>'form-control','id'=>'price','placeholder'=>'Price'])}}
                    <!-- <input type="address" class="form-control" name='address' placeholder="Enter user address"> -->
                </div>
                <div class="form-group">
                <label for="unit">Unit</label>
                {{Form::text('unit',Null,['class'=>'form-control','id'=>'unit','placeholder'=>'Unit'])}}
                    <!-- <input type="address" class="form-control" name='address' placeholder="Enter user address"> -->
                </div>

            <button type="submit" class="btn btn-primary">{{$botton}}</button>

            {!! Form::close() !!}
            </div>
        </div>
        </div>

</div>
@stop