<?php

namespace App\Http\Controllers\Penukaran;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('penukaran.produk', [
            'products' => $products,
        ]);
    }
}
