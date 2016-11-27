<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class sleep_data extends Model {

    protected $table = 'sleep_data';

    protected $fillable = ['user_id', 'start_time', 'end_time', 'sleep_time', 'sleep_level', 'created_at'];

}