<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
class Welcome extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = City::where('city_status','1')->get();
        return view('welcome',compact('cities'));
    }
}
