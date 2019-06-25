<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Photo;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view("admin.users.index", compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        // return $roles;
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        
        $row = $request->all();

        if($img = $request->file('img_id')){
            $name = time() . $img->getClientOriginalName();
            $img->move('images', $name);
            $photo = Photo::create([ 'path'=>$name ]);

            $row['img_id'] = $photo->id;
        }

        // $row['password'] = bcrypt($request['password']);

        User::create($row);
        
        return redirect("/admin/users");
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
        $user = User::find($id);
        return view("posts.show", compact('user'));
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view("admin.users.edit", compact('user', 'roles'));
        
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
        $user = User::findOrFail($id);
        if($request['password'] == ''){
            $row = $request->except('password');
        }else{
            $row = $request->all();
            // $row['password'] = bcrypt($request['password']);
        }
        if($img = $request->file('img_id')){
            $name = time() . $img->getClientOriginalName();
            $img->move('images', $name);
            $photo = Photo::create([ 'path'=>$name ]);

            $row['img_id'] = $photo->id;
        }

        $user->update($row);
        return redirect("admin/users");
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
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->path);
        $user->delete();
        return redirect('admin/users');
        
    }
}
