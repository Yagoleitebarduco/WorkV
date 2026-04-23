<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    public function showToSelectRegisterScreen() {
        return view('Auth.SelectedRegister');
    }

    public function showToHomeScreen() {
        return view("Home.User.Home");
    }
}
