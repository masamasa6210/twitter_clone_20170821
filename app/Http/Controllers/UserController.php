<?php
/**
 * Created by PhpStorm.
 * User: masatoshi
 * Date: 2017/08/24
 * Time: 6:48
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function user($url_name)
    {
        $user = Auth::user();
        $targetUser = User::where('url_name', $url_name)->first();
        $isfollow = $user->follows()->where('id', $targetUser->id)->exists();

        $count = count($targetUser->tweets);

        return view('user.index', [
            'user' => $user,
            'targetUser' => $targetUser,
            'isfollow' => $isfollow,
            'count' => $count,
        ]);
    }

    public function follow($url_name)
    {
        $user = Auth::user();
        $targetUser = User::where('url_name', $url_name)->first();

        $user->follows()->attach($targetUser->id);

        return redirect('user/' . $targetUser->url_name);
    }

    public function unfollow($url_name)
    {
        $user = Auth::user();
        $targetUser = User::where('url_name', $url_name)->first();
        $user->follows()->detach($targetUser->id);

        return redirect('user/' . $targetUser->url_name);
    }
}