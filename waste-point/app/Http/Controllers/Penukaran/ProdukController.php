<?php

namespace App\Http\Controllers\Penukaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('penukaran.produk');
    }
}
