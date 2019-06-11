@extends('layouts.app')


@section('content')

<h1>Edit Post</h1>

{!! Form::model($thePost, ['method'=>'PATCH', 'action'=>['PostsController@update', $thePost->id]]) !!}
  {{csrf_field()}}
  
   <div class="form-group">
    {!! Form::label('title', 'Title: ') !!}
    {!! Form::text('title', $thePost->title, ['class'=>'form-control']) !!}

    {!! Form::label('content', 'Content: ') !!}
    {!! Form::text('content', $thePost->content, ['class'=>'form-control']) !!}

    {{csrf_field()}}

    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
    
    </div>
    
{!! Form::close() !!}

@stop