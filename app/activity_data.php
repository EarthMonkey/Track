<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity_data extends Model {

    protected $table = 'activity_data';

    protected $fillable = ['id', 'name', 'description', 'launcher_id', 'start_time', 'end_time', 'award', 'created_at'];

}