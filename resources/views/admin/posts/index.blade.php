@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Auther ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Content</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></td>
                <td><img height="50px" src="{{$post->photo ? '/larapro/public'.$post->photo->path : 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('admin.posts.edit', $post->id)}}" style="font-size: 20px;">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{URL::to('/admin/posts/delete/'.$post->id)}}" style="font-size: 20px; color: #ff2626;"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
            @endforeach
        </tbody>
</table>
@stop