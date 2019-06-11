<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
    
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        $user = User::all();
        return view("posts.index", compact('posts', 'user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->title;
        
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        
        Post::create(['title'=>$request->title , 'content'=>$request->content]);
        return redirect("posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $thePost = Post::find($id);
        return view("posts.show", compact('thePost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $thePost = Post::find($id);
        return view("posts.edit", compact('thePost'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $thePost = Post::find($id);
        $thePost->update($request->all());
        return redirect("posts/$thePost->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $thePost = Post::whereId($id)->delete();
        return redirect('posts');
        
    }
    
    public function test($thing)
    {
        return view('test')->with('thing', $thing);
    }
    
    public function contact()
    {
        return view('contact');
    }
}
