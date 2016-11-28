<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 19:01
 */

namespace App\Http\Controllers;
use App\user_info;

class PersonalController extends Controller {
    public function getUserInfo()
    {
        $userId = 7;
        $userInfo = user_info::where('id', $userId)->get()->first();
        return $userInfo;
    }
}