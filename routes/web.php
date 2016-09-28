<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('adduser');
});

Route::get('/test', function () {
    return view('test');
});
Route::get('user',function(){
//return view('login');
return \App\UserModel::all();
});
