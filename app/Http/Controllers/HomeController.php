<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->roled == 'admin') {
                
            return view('admin.dashboard');
        }
        elseif(auth()->user()->roled == 'user')
        {
            return view('admin.dashboard');
        }
        
        else{
            return "404";
        }
    }
}
