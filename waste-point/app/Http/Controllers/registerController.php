<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    public function index()
    {
        return view('auth.register',[
            'title' => 'Register'
        ]);   
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|max:255',
            'nomorhp' => 'required|max:15',
            'address' => 'required|max:255',
            'password' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user=User::create($validatedData);

        
        Auth::login($user);
        return redirect('/')->with('successr', 'Registrasi Berhasil!!');;
        
    }
}
