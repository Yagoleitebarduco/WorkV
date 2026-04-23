<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaletController extends Controller
{
    public function showToWaletScreen() {
        return view('Home.Walet');
    }
}
