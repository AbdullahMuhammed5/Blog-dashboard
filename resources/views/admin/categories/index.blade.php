@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>
    <hr>

    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <td>Options</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}" style="font-size: 20px;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{URL::to('/admin/category/delete/'.$category->id)}}" style="font-size: 20px; color: #ff2626;"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
    {!! Form::open(['method'=>'post', 'action'=>'CategoryController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('New Category', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
@stop