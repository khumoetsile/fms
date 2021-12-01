<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
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
        $cities = City::where('city_status','1')->get();
        return view('welcome2',compact('cities'));
    }
}
