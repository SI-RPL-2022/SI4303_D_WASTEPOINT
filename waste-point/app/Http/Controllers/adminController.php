<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->is_admin == false){
                abort(403);
            }
        return view('admin.dashboard');    
    }
        
}

