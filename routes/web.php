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

Route::get('/',[
    'uses'=>"FrontEndController@index",
    'as'=>'home'
]);

Route::get('/post/{slug}',[
    'uses'=>"FrontEndController@singlePost",
    'as'=>'singlepost'
]);

Route::get("category/{category}",[
    'uses'=>"FrontEndController@category",
    "as"=>"category.all_posts"
]);

Route::get("tag/{tag}",[
    'uses'=>"FrontEndController@tag",
    "as"=>"tag.all_posts"
]);

Route::get("/list/category",[
    'uses'=>"FrontEndController@categoryAll",
    "as"=>"category.all_list"
]);

Route::get("/search","FrontEndController@search");

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get("/test",function(){
    //return App\User::find(1)->posts->category->category_id;
});



Route::group(['prefix'=>'admin','middleware'=>['auth','account']],function(){
    Route::get('/home', [
       "uses"=>"HomeController@index",
       "as"=>"home"
    ]);



    Route::resource("posts","PostController");
    Route::resource("categories","CategoryController");
    Route::get("/post/trashed/", "PostController@trashed")->name("posts.trashed");
    Route::get("/post/restore/{post}", "PostController@restore")->name("post.restore");
    Route::resource("tags","TagController");
    Route::resource("users","UserController");
    Route::get("users/permissions/{user}","UserController@permissions")->name("users.permissions");
    Route::get("users/make-admin/{user}","UserController@makeAdmin")->name("users.make-admin");
    Route::get("users/approve-account/{user}","UserController@approveAccount")->name("users.approve-account");
    Route::get("user/edit-own-profile",[
        'uses'=>'ProfileController@editOwnProfile',
        'as'=>'users.edit-own-profile'
    ]);

    Route::put("user/update-own-profile/",[
        'uses'=>'ProfileController@updateOwnProfile',
        'as'=>'users.update-profile'
    ]);

    Route::get("settings","WebSettingController@index")->name("settings.index");
    Route::put("update/settings/{setting}","WebSettingController@update")->name("settings.update");


});

