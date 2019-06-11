@extends('layouts.app')


@section('content')

<table border="1">
   <tr>
   <th>Auther ID</th>
   <th>Title</th>
   <th>Content</th>
   <th>Created at</th>
   <th>Updated at</th>
   <th>Delete</th>
    </tr>
   
    @foreach($posts as $post)
       <tr>
        <td>{{$post->user_id}}</td>
        <td><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></td>
        <td>{{$post->content}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
           <td><a href="{{route('posts.destroy', $post->id)}}">Delete</a></td>
        </tr>
    @endforeach
</table>

@stop