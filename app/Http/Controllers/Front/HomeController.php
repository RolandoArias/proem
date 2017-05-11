<?php

namespace App\Http\Controllers\Front;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home');
    }

    public function getMiCuenta()
    {
        //dd( old_input(null,2,'ok'));
        
        return view('front.pages.mi-cuenta')->with('carousel',false);;
    }
}
