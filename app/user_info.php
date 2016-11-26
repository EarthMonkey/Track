<?php
/**
 * Created by PhpStorm.
 * User: L.H.S
 * Date: 2016/11/26
 * Time: 21:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{

    protected $table = 'user_info';

    protected $fillable = ['id', 'username', 'gender', 'province', 'city', 'location',
        'blog', 'email', 'birthday', 'img_url', 'info_secret', 'body_secret'];

}