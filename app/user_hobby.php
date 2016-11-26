<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_hobby extends Model {

    protected $table = 'user_hobby';

    protected $fillable = ['id', 'user_id', 'hobby'];

}