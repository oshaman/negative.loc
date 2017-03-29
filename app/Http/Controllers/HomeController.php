<?php

namespace Oshaman\Publication\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->sidebar_vars = true;
        
        return $this->renderOutput();
    }
}
