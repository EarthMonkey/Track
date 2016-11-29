<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 18:57
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ActivityController extends Controller
{


    public function publish(Request $request)
    {

        $activity_name = $request->input('name');
        $description = $request->input('description');
        $launcher_id = $request->input('launcher_id');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $award = $request->input('award');

        DB::insert('insert into activity_data(activity_name, description, launcher_id, start_time, end_time, award) values(?,?,?,?,?,?)',
            [$activity_name, $description, $launcher_id, $start_time, $end_time, $award]);
    }

    public function getAllActivities()
    {

        $activities = DB::table('activity_data')->get();

        return $activities;
    }

    public function getMyPartin(Request $request)
    {

        $partin_id = $request->input('userId');
        $act_ids = DB::table('activity_user')->select('id')->where('partin_id', $partin_id)->get();

        $activities = array();
        for ($i = 0; $i < count($act_ids); $i++) {
            $activities[$i] = DB::table('activity_data')->where('id', $act_ids[$i]->id)->get();
        }

        return $activities;
    }

    public function getMyLaunch(Request $request)
    {

        $launcher_id = $request->input('userId');
        $activities = DB::table('activity_data')->where('launcher_id', $launcher_id)->get();

        return $activities;
    }

    public function partIn(Request $request)
    {

        $act_id = $request->input('act_id');
        $partin_id = $request->input('userId');
        $launcher_id = $request->input('launcher_id');
        $created_at = date('Y-m-d', time());

        DB::insert('insert into activity_user(id, partin_id, launcher_id, created_at) values(?,?,?,?)',
            [$act_id, $partin_id, $launcher_id, $created_at]);

    }

    public function partInAlready(Request $request)
    {

        $act_id = $request->input('act_id');
        $partin_id = $request->input('userId');
        $alreadyin = DB::table('activity_user')->where('id', $act_id)->where('partin_id', $partin_id)->count();

        return $alreadyin;
    }

    public function getParters(Request $request)
    {

        $act_id = $request->input('act_id');
        $parters = DB::table('activity_user')->where('id', $act_id)->count();

        return $parters;
    }
}