<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class sport_data extends Model {

    protected $table = 'sport_data';

    protected $fillable = ['id', 'heat', 'step', 'distance', 'created_at'];

}