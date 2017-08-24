<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support;


class SampleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        $displayName = Auth::user()->display_name;
        $urlName = Auth::user()->url_name;
        $Description = Auth::user()->description;

        return view('settings.account',[
            'display_name' => $displayName,
            'url_name' => $urlName,
            'description' => $Description,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $displayName = Auth::user()->display_name;
        $urlName = Auth::user()->url_name;
        $Description = Auth::user()->description;

        return view('settings.profile',[
            'display_name' => $displayName,
            'url_name' => $urlName,
            'description' => $Description,
        ]);
    }

    public function profile_update(Request $request, $displayName){
        $profile = User::where('display_name', $displayName)->firstOrFail();

        $profile->update([
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        return redirect('settings/profile'.$profile->display_name);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        return view('search');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user()
    {
        return view('user.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function following()
    {
        return view('user.following');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followers()
    {
        return view('user.followers');
    }
}
