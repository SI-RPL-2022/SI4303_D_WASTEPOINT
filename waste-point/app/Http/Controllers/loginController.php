<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
    
        return view('auth.login',[
            'title' => 'Login'
        ]);   
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']

        ]);   
    
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->is_admin == true){
                return redirect('/admin');
            }
            return redirect()->intended('/')->with('successl', 'Selamat Datang Kembali'.auth()->user()->name.'!!');

        
        }

        return back()->with('LoginError', 'Login Failed!');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
     
        return redirect('/');

    }
}
