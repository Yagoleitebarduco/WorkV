<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function showLoginScreen()
    {
        return view('Auth.Login.Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt(($credentials))) {
            $request->session()->regenerate();

            $user = Auth::user();
            dd($user);

            if ($user->is_freelancer == 1) {
                return redirect()->route('home');
            }

            if ($user->is_freelancer == 0) {
                return redirect()->route('ccompany.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email ou senha inválidos.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
