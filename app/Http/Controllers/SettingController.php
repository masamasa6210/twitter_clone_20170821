<?php
/**
 * Created by PhpStorm.
 * User: masatoshi
 * Date: 2017/08/23
 * Time: 11:08
 */

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SettingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function profile()
    {
        $profile = Auth::user();

        return view('settings.profile', ['profile' => $profile]);
    }

    public function profile_update(Request $request){
        $profile = Auth::user();

        $this->validate($request,[
            'display_name' => 'required',
        ]);

        $profile->update([
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        return redirect('setting/profile');

    }



    public function account()
    {
        $account = Auth::user();

        return view('settings.account', ['account' => $account]);
    }


    public function account_update(Request $request)
    {
        $account = Auth::user();

        $this->validate($request,[
            'url_name' => 'required|alpha_num',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);



            $account->update([
                'url_name' => $request->input('url_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        return redirect('setting/account');
    }



//
}