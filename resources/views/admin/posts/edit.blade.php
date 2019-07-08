@extends('layouts.admin')


@section('content')

<h1>Edit Post</h1>

{!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostController@update', $post->id], 'files'=>true]) !!}
  
    <div class="form-group">
        {!! Form::label('title', 'Title: ') !!}
        {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category: ') !!}
        {!! Form::select('category_id', [''=>'---']+$categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Content: ') !!}
        {!! Form::textarea('content', $post->content, ['class'=>'form-control']) !!}
    <div class="form-group">

    <div class="form-group">
        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
    </div>

    
    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
    
    
{!! Form::close() !!}

@stop