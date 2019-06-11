<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use App\User;
use App\Address;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});




/*Route::get('/hi', function () {
    return '<h1>Hi!!</h1>';
});

Route::get('/post/{id}', function ($id) {
    return "<h1>This is post number $id</h1>";
});*/

/*Route::get('/insert', function () {
    DB::insert('insert into post(title, content) values(?, ?)', ['PHP course', "it is a fucking php course with a very silly instructor"]);
});*/

/*Route::get('/read', function () {
    $results = DB::select('select * from post where id=?', [1]);
    
    foreach($results as $post){
        return $post->title; 
    }
});*/

/*Route::get('/update', function () {
    DB::update('update post set title = ? where id=?', ['javascript course', 1]);
    
    $results = DB::select('select * from post where id=?', [1]);
    
    foreach($results as $post){
        return $post->title; 
    }
    
});*/

/*Route::get('/delete', function () {
    DB::delete('delete from post where id=?', [1]);
});*/

/*
Using Elequent: 
*/


/*Route::get('/read', function () {
    $results = Post::where('id', 2)->get();
    
    foreach($results as $post){
        return $post->title; 
    }
});

Route::get('/insert', function () {    
    $post = new Post;
    
    $post->title = 'JS course';
    $post->content = 'it is a fucking php course with a very silly instructor';
    
    $post->save();
});


Route::get('/edit', function () {    
    $post = Post::find(3);
    
    $post->title = 'bootstrap course';
    $post->content = 'it is a fucking php course with a very silly instructor';
    
    $post->save();
});

Route::get('/edit', function () {    
    $post = Post::find(3);
    
});


Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post;
});

Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});


Route::get('/posts', function () {
    $user = User::find(2);
    
    foreach($user->posts as $post){
        echo $post->title;
    }
});

Route::get('/roles/{id}', function ($id) {
    $user = User::find($id);
    
    foreach($user->roles as $role){
        echo $role->name;
    }
});*/



/*
Route::get('/post', 'PostsController@index');

Route::get('/contact', 'PostsController@contact');

Route::resource('/posts', 'PostsController');
*/


/*Route::get('/insert', function () {   
    $user = User::findOrfail(1);
    $address = new Address(['name' => 'cairo']);
    
    $user->address()->save($address);
});

Route::get('/edit', function () {   
    
    $address = Address::whereUserId(1)->first();
    
    $address->name = "el monofia";
    
    $address->save();
});*/

/*Route::get('/insert', function () {
    $user = User::find(1);
    $post = new Post(['title' => 'JS course',
    'content' => 'it is a fucking JS course with a very silly instructor']);
    
    $user->posts()->save($post);
});

Route::get('/read', function () {
    $user = User::find(1);
    
    return $user->posts;
});*/


/*Route::group(['middleware' => 'web'], function(){
    Route::resource('/posts', 'PostsController');
});

Route::get('/dates', function(){
    $date = new datetime('+4 week');
    
    echo $date->format('m-d-Y');
    
    echo '<br />';
    
    echo Carbon::now()->yesterday();
    
    
});*/


Route::resource('admin/users', 'UserController');






















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
