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
Route::get('Register', 'LoginController@register');

Route::get('CheckRepeat', 'LoginController@checkRepeat');

Route::get('Login', 'LoginController@login');

Route::get('GetUsername', 'LoginController@getUsername');

// 首页
Route::get('/HomePage/{username}/{userId}', function ($username, $userId) {
    return view('pages/HomePage', ['username' => $username, 'userId' => $userId]);
});

// 日迹
Route::get('/Daily/{username}/{userId}', function ($username, $userId) {
    return view('pages/Daily', ['username' => $username, 'userId' => $userId]);
});

Route::get('DailySport', 'DailyController@getDaily');

Route::get('DailySleep', 'DailyController@getSleep');

Route::get('DailyBody', 'DailyController@getBody');

// 赛迹
Route::get('/Activity/{username}/{userId}', function ($username, $userId) {
    return view('pages/Activity', ['username' => $username, 'userId' => $userId]);
});

Route::post('PublishActivity', 'ActivityController@publish');

Route::post('GetAllActivities', 'ActivityController@getAllActivities');
Route::post('GetMyLaunch', 'ActivityController@getMyLaunch');
Route::post('GetMyPartin', 'ActivityController@getMyPartin');

Route::get('GetParters', 'ActivityController@getParters');

Route::post('PartInActivity', 'ActivityController@partIn');

Route::get('AlreadyIn', 'ActivityController@partInAlready');

// 足迹
Route::get('/History/{username}/{userId}', function ($username, $userId) {
    return view('pages/History', ['username' => $username, 'userId' => $userId]);
});

// 个人中心
Route::get('/Personal/{username}/{userId}', function ($username, $userId) {
    return view('pages/Personal', ['username' => $username, 'userId' => $userId]);
});

Route::get('PersonalInfo', 'PersonalController@getUserInfo');

Route::post('UpdateInfo', 'PersonalController@updateUserInfo');

// 人迹
Route::get('/Social/{username}/{userId}', function ($username, $userId) {
    return view('pages/Social', ['username' => $username, 'userId' => $userId]);
});

Route::post('Share', 'SocialController@publishShare');

Route::post('GetShare', 'SocialController@getShares');

Route::post('ThumbUp', 'SocialController@thumbUp');
Route::get('GetThumbs', 'SocialController@getThumbs');

Route::get('AlreadyThumb', 'SocialController@alreadyThumbUp');

Route::post('Search', 'SocialController@searchUsers');

Route::post('AddConcern', 'SocialController@addConcern');

Route::post('GetConcern', 'SocialController@getConcern');

Route::post('GetFans', 'SocialController@getFans');

Route::get('AlreadyConcern', 'SocialController@alreadyConcern');