<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaanProdukPemilahController extends Controller
{
    public function index()
    {
        return view('admin.produk_pemilahan');
    }
}
