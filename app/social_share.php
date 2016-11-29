<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class social_share extends Model {

    protected $table = 'social_share';

    protected $fillable = ['id', 'user_id', 'content', 'created_at'];

}