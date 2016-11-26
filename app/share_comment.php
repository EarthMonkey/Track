<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class share_comment extends Model {

    protected $table = 'share_comment';

    protected $fillable = ['id', 'share_id', 'content', 'user_id', 'created_at'];

}