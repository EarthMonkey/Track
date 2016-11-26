<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class body_data extends Model {

    protected $table = 'body_data';

    protected $fillable = ['id', 'weight', 'height', 'created_at'];

}