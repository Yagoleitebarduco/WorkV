<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobsController extends Controller
{
    public function showToMyJobsScreen() {
        return view('Home.User.MyJob');
    }
}
