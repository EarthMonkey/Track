<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity_user extends Model {

    protected $table = 'activity_user';

    protected $fillable = ['id', 'partin_id', 'launcher_id', 'created_at'];

}