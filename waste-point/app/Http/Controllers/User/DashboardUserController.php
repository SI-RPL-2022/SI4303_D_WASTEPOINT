<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Models\Waste;
use App\Http\Controllers\Controller;
use App\Models\ProductExchange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();
        $wastes = Waste::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        $product_exchanges = ProductExchange::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(5);
        $weight = Waste::where('user_id', auth()->user()->id)->where('status', 'selesai')->sum('weight');
        $kategori = ['Kertas', 'Plastik', 'Kaleng', 'Jelantah'];

        return view('user.dashboarduser', [
            'user' => $user,
            'wastes' => $wastes,
            'product_exchanges' => $product_exchanges,
            'weight' => $weight,
            'kategori'=> $kategori
        ]);
    }
    
    public function sampah($id)
    {

        $wastes = Waste::where('id', $id)->get();
        $kategori = ['Kertas', 'Plastik', 'Kaleng', 'Jelantah'];

        foreach ($wastes as $waste) {
            if ($waste->user_id == Auth::user()->id) {
                return view('user.detail_sampah', [
                    'wastes' => $wastes,
                    'kategori'=> $kategori
                ]);
            } else {
                abort(404);
            }
        }
        
    }

    public function produk($id)
    {
        $product_exchanges = ProductExchange::where('id', $id)->get();
        $status = ['Dalam proses', 'Dalam pengiriman', 'Selesai'];
        
        foreach ($product_exchanges as $product_exchange) {
            if ($product_exchange->user_id == auth()->user()->id) {
                return view('user.detail_penukaran_produk', [
                    'product_exchanges' => $product_exchanges,
                    'status' => $status,
                ]);
            } else {
                return view('not-found');
            }
        }
    }

    public function update($id)
    {
        $selesai = 'Selesai';
        $product_exchange = ProductExchange::where('id', $id)->first();
        $product_exchange->update(['status' => $selesai]);
        return back()->with('update_success', 'Penukaran produk telah selesai!');
    }
}
