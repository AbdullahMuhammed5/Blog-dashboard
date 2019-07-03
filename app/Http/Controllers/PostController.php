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
