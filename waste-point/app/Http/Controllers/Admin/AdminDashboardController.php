<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Waste;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductExchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $weight_total = Waste::where('status', 'Selesai')->sum('weight');
        $products = Product::count();
        $users = User::where('is_admin', false)->count();

        $kertas = Waste::where('category', 'Kertas')->where('status', 'Selesai')->sum('weight');
        $plastik = Waste::where('category', 'Plastik')->where('status', 'Selesai')->sum('weight');
        $kaleng = Waste::where('category', 'Kaleng')->where('status', 'Selesai')->sum('weight');
        $jelantah = Waste::where('category', 'Jelantah')->where('status', 'Selesai')->sum('weight');

        $update_waste = Waste::where('status', 'Belum diverifikasi')->count();
        $update_product_exchange = ProductExchange::where('status', 'Dalam proses')->count();

        return view('admin.dashboard', [
            'weight_total' => $weight_total,
            'products' => $products, 
            'users' => $users,
            'kertas' => $kertas,
            'plastik' => $plastik,
            'kaleng' => $kaleng,
            'jelantah' => $jelantah,
            'update_waste' => $update_waste,
            'update_product_exchange' => $update_product_exchange,
        ]);    
    }
}
