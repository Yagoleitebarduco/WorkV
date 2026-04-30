<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Company;

use function Laravel\Prompts\password;

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

            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        };

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('company.dashboard');
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
            'email' => 'Credenciais de empresa inválidas.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('company')->check()) {
            Auth::guard('company')->logout();
        }
        Auth::guard('web')->logout();
        Auth::guard('company')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
