<?php

namespace App\Http\Controllers;

use App\Tweet;
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
        $tweets = Tweet::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('home', [
            'tweets' => $tweets,
            'user'   => $user,

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
