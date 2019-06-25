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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'admin'], function(){
    Route::resource('admin/users', 'UserController', ['as' => 'admin']);
});
Route::get('admin/user/delete/{id}', 'UserController@destroy');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function(){
    return view('admin.index');
});