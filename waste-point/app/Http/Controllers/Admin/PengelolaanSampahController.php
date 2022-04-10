<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Waste;

class PengelolaanSampahController extends Controller
{
    public function index()
    {
        $number = 1;
        $wastes = Waste::all();
        return view('admin.penukaran_sampah', [
            'wastes' => $wastes,
            'number' => $number
        ]);
    }
}
