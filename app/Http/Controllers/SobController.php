<?php

namespace App\Http\Controllers;

class SobController extends Controller
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
     * Shows the sobs administration dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sobs.index');
    }
}
