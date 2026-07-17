<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $r)
    {
        $data = $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $r->session()->regenerate();

            if (auth()->user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah'
            ])
            ->onlyInput('email');
    }

    public function logout(Request $r)
    {
        Auth::logout();

        return redirect('/');
    }
}