<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuralController extends Controller
{
    public function showToMuralScreen() {
        return view('Home.Mural');
    }
}
