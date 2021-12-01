<?php

namespace App\Http\Controllers\Error;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    /**
     * Display Country listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('errors.403');
    }

}
