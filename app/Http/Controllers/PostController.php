<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Auth;
use App\Http\Requests\AddPostRequest;
use App\Post;
use App\Category;
use App\Photo;
use App\User;
    
class PostController extends Controller
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
        return view("admin.posts.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin/posts/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostRequest $request)
    {
        // return $request->title;
        $row = $request->all();
        $user = Auth::user();

        if($img = $request->file('photo_id')){
            $name = time() . $img->getClientOriginalName();
            $img->move('images', $name);
            $photo = Photo::create([ 'path'=>$name ]);

            $row['photo_id'] = $photo->id;
        }

        $user->posts()->create($row);
        return redirect("/admin/posts");
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
        $post = Post::find($id);
        return view("admin.posts.show", compact('post'));
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
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view("admin.posts.edit", compact('post', 'categories'));
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
        $row = $request->all();
        $user = Auth::user();

        if($img = $request->file('photo_id')){
            $name = time() . $img->getClientOriginalName();
            $img->move('images', $name);
            $photo = Photo::create([ 'path'=>$name ]);

            $row['photo_id'] = $photo->id;
        }
        Auth::user()->posts()->whereId($id)->first()->update($row);
        return redirect("admin.posts");
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
        $post = Post::findOrFail($id);
        if($post->photo){
            unlink(public_path().$post->photo->path);
        }
        $post->delete();
        return redirect('admin/posts'); 
    }
    
}
