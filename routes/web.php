<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/home', [
       "uses"=>"HomeController@index",
       "as"=>"home"
    ]);

    Route::resource("posts","PostController");
    Route::resource("categories","CategoryController");
    Route::get("/post/trashed/", "PostController@trashed")->name("posts.trashed");
    Route::get("/post/restore/{post}", "PostController@restore")->name("post.restore");

});

