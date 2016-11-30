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

    public function getShares()
    {

        $shares = DB::table('social_share')->get();
        return $shares;
    }

    public function thumbUp(Request $request)
    {

        $sh_id = $request->input('sh_id');
        $userId = $request->input('userId');
        $created_at = date('Y-m-d h:i', time());

        $alreadyIn = DB::table('share_good')
            ->where('id', $sh_id)->where('praise_id', $userId)->count();

        if($alreadyIn > 0) {

            DB::delete('delete from share_good where id=? and praise_id=?',
                [$sh_id, $userId]);

            return -1;
        } else {
            DB::insert('insert into share_good(id, praise_id, created_at) values(?,?,?)',
                [$sh_id, $userId, $created_at]);

            return 1;
        }

    }

    public function getThumbs(Request $request)
    {
        $sh_id = $request->input('sh_id');
        $thumbs = DB::table('share_good')->where('id', $sh_id)->count();

        return $thumbs;
    }

    public function alreadyThumbUp(Request $request) {

        $sh_id = $request->input('sh_id');
        $userId = $request->input('userId');

        $alreadyIn = DB::table('share_good')
            ->where('id', $sh_id)->where('praise_id', $userId)->count();

        return $alreadyIn;
    }
}