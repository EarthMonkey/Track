<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages/Login');
});

Route::get('/HomePage', function () {
    return view('pages/HomePage');
});

Route::get('/Daily', function () {
    return view('pages/Daily');
});

Route::get('/Activity', function () {
    return view('pages/Activity');
});

Route::get('/History', function () {
    return view('pages/History');
});

Route::get('/Personal', function () {
    return view('pages/Personal');
});

Route::get('/Social', function () {
    return view('pages/Social');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
