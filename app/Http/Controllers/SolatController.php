<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolatController extends Controller
{
    public function index(){
        return view('solat.index');
    }
}
