@extends('layouts.app')


@section('content')

<h1>Create Post</h1>

{!! Form::open(['method'=>'post', 'action'=>'PostsController@store', 'files'=>true]) !!}
   <div class="form-group">
    {!! Form::label('title', 'Title: ') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}

    {!! Form::label('content', 'Content: ') !!}
    {!! Form::text('content', null, ['class'=>'form-control']) !!}
    
    <!--{!! Form::file('file', ['class'=>'form-control']) !!}-->

    {{csrf_field()}}

    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
    
    </div>
    
{!! Form::close() !!}

@if(count($errors) > 0)

<div class="alert alert-danger">
   <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach 
    </ul>   
</div>

@endif

@stop