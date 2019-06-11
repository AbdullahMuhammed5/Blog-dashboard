@extends('layouts.app')


@section('content')

<h1>{{$thePost->title}}</h1>
<h2>{{$thePost->content}}</h2>

<button class="btnbtn-primary"><a href="{{$thePost->id}}/edit">edit</a></button>
<br />
{!! Form::model($thePost, ['method'=>'delete', 'action'=>['PostsController@destroy', $thePost->id]]) !!}

    {{csrf_field()}}
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        
{!! Form::close() !!}

@stop