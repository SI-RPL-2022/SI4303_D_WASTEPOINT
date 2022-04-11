<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Models\Waste;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();
        $wastes = Waste::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        $kategori = ['Kertas', 'Plastik', 'Kaleng', 'Jelantah'];

        return view('user.dashboarduser', [
            'user' => $user,
            'wastes' => $wastes,
            'kategori'=> $kategori
            
        ]);
    }
    public function sampah($id)
    {

        $wastes = Waste::where('id', $id)->get();

        foreach ($wastes as $waste) {
            if ($waste->user_id == Auth::user()->id) {
                return view('user.detail_sampah', [
                    'wastes' => $wastes,
                ]);
            } else {
                abort(404);
            }
        }
        
    }
}
