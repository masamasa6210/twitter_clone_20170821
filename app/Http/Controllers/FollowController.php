<?php
/**
 * Created by PhpStorm.
 * User: masatoshi
 * Date: 2017/08/23
 * Time: 16:16
 */

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followers()
    {
        $followers = Auth::user();

        return view('user.followers');
    }


    public function following()
    {


        return view('user.following');
    }



}