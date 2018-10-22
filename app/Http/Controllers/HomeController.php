<?php

namespace App\Http\Controllers;

use App\Movie;
use Auth;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('web')->check())
        {
            return redirect('macaddress');
        }
        if (Auth::guard('admin')->check())
        {
            return redirect('admin');
        }
        return redirect('login');
        //return view('Client.dashboard');
    }
}
