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

    public function getAllActivities() {

        $activities = DB::table('activity_data')->get();

        return $activities;
    }

    
}