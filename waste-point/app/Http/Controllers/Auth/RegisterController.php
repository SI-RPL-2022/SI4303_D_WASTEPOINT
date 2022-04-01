<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'unique:users', 'email:dns'],
            'password' => ['required', 'min:5'],
            'nomorhp' => ['required'],
            'address' => ['required', 'min:5']
        ]);

        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('auth', 'Selamat Datang di Waste Point!');
    }
}
