<?php
/**
 * Created by PhpStorm.
 * User: masatoshi
 * Date: 2017/08/23
 * Time: 16:16
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    public function followers()
    {
        $user = Auth::user();
        $followUsers = User::find($user->id)->follows()->get();

        return view('user.followers',[
            'user' => $user,
            'follow_users' => $followUsers
        ]);
    }

    public function follow($url_name)
    {
        $user = Auth::user();
        $targetUser = User::where('url_name', $url_name)->first();
        $user->follows()->attach($targetUser->id);

        return redirect()->back();
    }

    public function unfollow($url_name)
    {
        $user = Auth::user();
        $targetUser = User::where('url_name', $url_name)->first();
        $user->follows()->detach($targetUser->id);

        return redirect()->back();
    }


}