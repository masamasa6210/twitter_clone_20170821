<?php
/**
 * Created by PhpStorm.
 * User: masatoshi
 * Date: 2017/08/23
 * Time: 16:33
 */

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Friendship extends Authenticatable
{
    use Notifiable;

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
    'follower_id',
    'followee_id',
    'create_at',
    'updated_at',
];


}