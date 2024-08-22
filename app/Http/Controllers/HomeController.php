<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application's home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home'); // it shows in home.blade.php view file
    }
}
