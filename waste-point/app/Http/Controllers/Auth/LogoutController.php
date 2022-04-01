<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();
    
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
        
        return redirect(RouteServiceProvider::HOME);
    }
}
