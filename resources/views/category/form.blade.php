@extends('layout.main')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
    <h1>    <a href="{{route('categories.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Back</a>
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
                {!! Form::model($category,['route' => ['categories.update',$category->id],'method' => 'put']) !!}

                @else
                {!! Form::open(['route' => ['categories.store'],'method' => 'post']) !!}
                @endif


                <div class="form-group">
                <label for="name">Title</label>
                  {{Form::text('title',Null,['class'=>'form-control','id'=>'title','placeholder'=>'Title'])}}
                  <!-- <input type="title" class="form-control" title='title' placeholder=" Enter user title"> -->
                </div>
            <button type="submit" class="btn btn-primary">{{$botton}}</button>

            {!! Form::close() !!}
            </div>
        </div>
        </div>

</div>
@stop