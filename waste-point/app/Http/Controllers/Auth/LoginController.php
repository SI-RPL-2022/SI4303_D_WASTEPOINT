<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->is_admin){
                return redirect('/admin');
            }
            return redirect(RouteServiceProvider::HOME)->with('auth', 'Selamat Datang Kembali ' . Auth::user()->name . '!');
        }

        return back()->with('login-error', 'Login Gagal! email atau password tidak ditemukan');
    }
}
