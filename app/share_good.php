<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class share_good extends Model {

    protected $table = 'share_good';

    protected $fillable = ['id', 'author_id', 'praise_id', 'created_at'];

}