<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $_stisla_bg_login = asset('assets/images/auth/bg.jpg'); // Updated path
        $city = 'Samarinda'; // Replace with actual city
        $country = 'Indonesia'; // Replace with actual country

        return view('auth.login', [
            '_stisla_bg_login' => $_stisla_bg_login,
            'city' => $city,
            'country' => $country
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('dashboard'); // Redirect to the dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
