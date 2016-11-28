<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 18:56
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sport_data;
use App\sleep_data;
use App\body_data;
use Auth;

class DailyController extends Controller
{

    public function getDaily(Request $request)
    {

        $userId = $request->input('userId');
        $sportData = sport_data::where('id', $userId)
            ->get()->first();
        return $sportData;
    }

    public function getSleep(Request $request)
    {
        $userId = $request->input('userId');
        $sleepData = sleep_data::where('user_id', $userId)->get()->first();
        return $sleepData;
    }

    public function getBody(Request $request)
    {
        $userId = $request->input('userId');;
        $bodyData = body_data::where('id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();
        return $bodyData;
    }

}