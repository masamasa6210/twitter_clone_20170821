<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $user = Auth::user();
        $followUsers = $user->follows()->get();
        $tweet = Tweet::whereIn('user_id', $followUsers->pluck('id'))->orderBy('created_at', 'desc')->get();
        $tweets = $tweet->merge(Tweet::where('user_id', $user->id)->get());
//        dd($merge);
//        dd([$user->id, $followUsers->pluck('id')],Tweet::whereIn('user_id', [$user->id, $followUsers->pluck('id')])->orderBy('created_at', 'desc')->toSql());
        $followCount = count($followUsers);

        return view('home', [
            'tweets' => $tweets,
            'user'   => $user,
            'followCount' => $followCount,

        ]);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');
        $tweets = Tweet::where('body', 'like' ,'%'.$search.'%')->get();

        return view('search', [
            'user'   => $user,
            'search' => $search,
            'tweets' => $tweets,
            ]);
    }

    public function tweet(Request $request)
    {
        Tweet::create([
            'user_id' => Auth::id(),
            'body' => $request->input('body'),
        ]);

        return redirect('home');
    }
}
