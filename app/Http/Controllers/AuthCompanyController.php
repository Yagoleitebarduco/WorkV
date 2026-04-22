<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthCompanyController extends Controller
{
    public function showToRegisterCompany () {
        return view('Auth.Register.RegisterCompany');
    }
}
