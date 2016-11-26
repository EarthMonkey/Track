<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_plan extends Model {

    protected $table = 'user_plan';

    protected $fillable = ['id', 'plan', 'user_id', 'created_at', 'updated_at'];

}