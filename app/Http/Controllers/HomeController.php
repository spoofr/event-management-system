<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hadith;

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
        $hadiths = Hadith::inRandomOrder()->take(1)->get();
        return view('home', compact('hadiths'));
    }
}
