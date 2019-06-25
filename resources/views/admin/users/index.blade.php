@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img height="50px" src="{{$user->photo ? '/larapro/public'.$user->photo->path : 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_Active == 1 ? 'Active' : 'Inactive'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('admin.users.edit', $user->id)}}" style="font-size: 20px;">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{URL::to('/admin/user/delete/'.$user->id)}}" style="font-size: 20px; color: #ff2626;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
@stop