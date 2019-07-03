@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['method'=>'post', 'action'=>'PostController@store', 'files'=>true]) !!}
   <div class="form-group">
        {!! Form::label('title', 'Title: ') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category: ') !!}
        {!! Form::select('category_id', [''=>'---']+$categories, '', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Content: ') !!}
        {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
    </div>

    <!-- <div class="form-group">
        {!! Form::label('photo_id', 'Category: ') !!}
        {!! Form::text('category_id', null, ['class'=>'form-control']) !!}
    </div> -->


    <div class="form-group">
        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
    </div>

    <!-- {{csrf_field()}} -->

    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
    
    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@stop