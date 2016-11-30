<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 19:01
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_info;
use DB;

class PersonalController extends Controller
{

    public function getUserInfo(Request $request)
    {
        $userId = $request->input('userId');
        $userInfo = user_info::where('id', $userId)->get()->first();
        return $userInfo;
    }

    public function updateUserInfo(Request $request)
    {
        $userId = $request->input('userId');
        $username = $request->input('username');
        $province = $request->input('province');
        $city = $request->input('city');
        $location = $request->input('location');
        $blog = $request->input('blog');
        $email = $request->input('email');
        $birthday = $request->input('birthday');

        DB::table('user_info')->where('id', $userId)
            ->update([
                'province' => $province,
                'city' => $city,
                'location' => $location,
                'blog' => $blog,
                'email' => $email,
                'birthday' => $birthday
            ]);
    }
}