<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class NewShipController extends Controller
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
    public function details(Request $request)
    {   
        
        if ($request->session()->has('year')) {
            return view('\new_ship\details');
        }else{
            return view('/home');
        }
        
    }
    public function get_time(Request $request)
    {   
        $weekday = $request->weekday;
        $day = $request->day;
        $month = $request->month;
        $hours = $request->hours;
        $minitus = $request->minitus;
        $year = $request->year;
        $request->session()->put('weekday', $weekday);
        $request->session()->put('year', $year);
        $request->session()->put('day', $day);
        $request->session()->put('month', $month);
        $request->session()->put('hours', $hours);
        $request->session()->put('minitus', $minitus);
    }
}