<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:49
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model {

    protected $table = 'users';

    protected $fillable = ['id', 'username', 'password', 'power', 'created_at', 'updated_at'];

}