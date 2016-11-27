<?php

use Illuminate\Http\Request;

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

// 登录注册
Route::get('Register/{username}/{password}', 'LoginController@register');

Route::get('CheckRepeat', 'LoginController@checkRepeat');

Route::get('Login', 'LoginController@login');

// 首页
Route::get('/HomePage/{username}/{userId}', function ($username, $userId) {
    $_SESSION['userId'] = $userId;
    return view('pages/HomePage', ['username' => $username]);
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
