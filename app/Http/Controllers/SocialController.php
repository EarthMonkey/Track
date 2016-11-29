<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 19:00
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SocialController extends Controller
{

    public function publishShare(Request $request)
    {
        $userId = $request->input('userId');
        $content = $request->input('content');
        $created_at = date('Y-m-d h:i', time());

        DB::insert('insert into social_share(user_id, content, created_at) values(?,?,?)',
            [$userId, $content, $created_at]);
    }

    public function getShares() {

        $shares = DB::table('social_share')->get();
        return $shares;
    }

}