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

    }
}