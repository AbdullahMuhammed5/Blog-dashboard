@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">
        <img src="{{$user->photo ? '/larapro/public'.$user->photo->path : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">
        {!! Form::model($user, ['method'=>'patch', 'action'=>['UserController@update', $user->id], 'files'=>true]) !!}
            
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Role:') !!}
                {!! Form::select('role_id', [''=>'----']+$roles) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Status:') !!}
                {!! Form::select('is_Active', array(1 => 'active', 0 => 'Inactive'), null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('file', 'Choose image:') !!}
                {!! Form::file('img_id', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}    
            </div>

        {!! Form::close() !!}
    </div>
    </div>

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