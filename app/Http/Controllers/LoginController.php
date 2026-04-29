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
<<<<<<< HEAD
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)){
=======
            'password' => ['required', 'string'],
        ]);


        if (Auth::guard('web')->attempt($credentials)) {
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();
            $targetRoute = $user->is_freelancer ? 'home' : 'company.dashboard';
            return redirect()->intended(route($targetRoute));
        }

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();
<<<<<<< HEAD
            return redirect()->route('company.dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciais Invalidas',
=======

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
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
<<<<<<< HEAD
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('company')->check()) {
            Auth::guard('company')->logout();
        }
=======
        Auth::guard('web')->logout();
        Auth::guard('company')->logout();
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
