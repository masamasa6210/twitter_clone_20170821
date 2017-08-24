<?php
/**
 * Created by PhpStorm.
 * User: masatoshi
 * Date: 2017/08/24
 * Time: 6:48
 */

namespace App\Http\Controllers;

use App\User;


class UserController extends Controller
{
    public function user($url_name)
    {
        $urlName = User::where('url_name', $url_name)->first();

        return view('user.index', [
            'urlName' => $urlName,
        ]);
    }
}