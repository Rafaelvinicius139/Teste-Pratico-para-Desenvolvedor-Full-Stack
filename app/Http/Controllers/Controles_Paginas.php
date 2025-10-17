<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controles_Paginas extends Controller
{
    public function menu(){
        return view('home');
    }
}
