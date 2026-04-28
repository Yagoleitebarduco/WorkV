<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginScreen()
    {
        return view('Auth.Login.Login');
    }

    public function showCompanyLoginScreen()
    {
        return view('Auth.Login.LoginCompany');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);


        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();
            $targetRoute = $user->is_freelancer ? 'home' : 'company.dashboard';
            return redirect()->intended(route($targetRoute));
        }

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('company.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email ou senha inválidos.',
        ])->onlyInput('email');
    }

    public function loginCompany(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('company.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Credenciais de empresa inválidas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('company')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
