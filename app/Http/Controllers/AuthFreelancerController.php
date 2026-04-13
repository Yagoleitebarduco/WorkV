<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;
use App\Models\City;
use App\Models\Skills;

class AuthFreelancerController extends Controller
{
    public function showRegisterFreelancer () {
        $skills = Skills::all();
        $cities = City::all();

        return view('Auth.Register.RegisterFreelancer', compact('skills', 'cities'));
    }

    public function registerfreelancer (Request $request) {
        $validated = $request->validate([
            'terms' => 'accepted'
        ]);

        
    }
}
