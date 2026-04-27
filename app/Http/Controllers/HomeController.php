<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    public function showToSelectRegisterScreen() {
        return view('Auth.SelectedRegister');
    }

    public function showToHomeScreen() {
        return view('Home.User.Home');
    }

    public function showToDashboardCompanyScreen() {
        return view('Home.Company.Dashboard');
    }
}
