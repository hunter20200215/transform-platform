<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ShipmentController extends Controller
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
    public function all(Request $request)
    {   
        $shipping_data = DB::table('shipping_tables')
                            ->where('user_id', Auth::user()->id)
                            ->get();
                            // ->paginate(10);
        $view = view('layouts.apply',['shipping_datas' => $shipping_data])->render();
        
        return view('active_shipment',['view' => $view]);
        
    }
}