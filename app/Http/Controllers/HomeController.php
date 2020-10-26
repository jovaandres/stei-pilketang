<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function home()
    {
        return view('home.home');
    }

    public function ketang()
    {
        return view('home.ketang');
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('home.profile', [ 'user' => $user ]);
    }
}
