@extends('layouts.admin')


@section('content')

<h1>Edit Category</h1>

{!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id]]) !!}
  
    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', $category->title, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
    
{!! Form::close() !!}

@stop