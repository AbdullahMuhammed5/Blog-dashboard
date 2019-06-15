@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'UserController@store', 'files'=>true]) !!}
        
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
            {!! Form::select('is_Active', array('' => '----', 1 => 'active', 0 => 'Inactive'), '') !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', 'Choose image:') !!}
            {!! Form::file('img_path', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}    
        </div>

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