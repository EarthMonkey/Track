<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 18:52
 */

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $name_valid = DB::table('users')->where('username', $username)->count();
        if ($name_valid > 0) {
            $ID = DB::table('users')->where('username', $username)->where('password', $password)->get();
            return $ID;
        } else {
            return -2;
        }

    }


    public function Register(Request $request, $username, $password)
    {

        $created_at = date('Y-m-d', time());
        DB::insert('insert into users(username, password, power, created_at, updated_at) values(?,?,?,?,?)',
            [$username, $password, "普通会员", $created_at, $created_at]);

        $userId = DB::table('users')->select('id')->where('username', $username)->get();
        return view('pages.HomePage', ['username' => $username, 'userId' => $userId]);
    }


    public function checkRepeat(Request $request)
    {

        $username = $request->input('username');
        $repeats = DB::table('users')->where('username', $username)->count();

        return $repeats;
    }

    public function getUsername(Request $request) {

        $userId = $request->input('userId');
        $users = DB::table('users')->select('username')->where('id', $userId)->get();

        return $users;

    }
}