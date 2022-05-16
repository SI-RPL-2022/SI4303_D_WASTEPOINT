<?php

namespace App\Http\Controllers\Penukaran;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductExchange;
use App\Models\User;
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

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('penukaran.detail_produk', [
            'product' => $product,
        ]);
    }

    public function store(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $user = User::where('id', auth()->user()->id)->first();
        
        $request->validate([
            'quantity' => ['required', 'min:1', 'integer'],
            'postal_code' => ['required'],
        ]);

        if (!auth()->user()->is_admin) {
            if (auth()->user()->waste_poins >= $request->quantity * $product->price_point) {
                ProductExchange::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'total_points' => $request->quantity * $product->price_point,
                    'note' => $request->note,
                ]);

                $product->stock -= $request->quantity;
                $product->update();

                $user->waste_poins -= $request->quantity * $product->price_point;
                $user->postal_code = $request->postal_code;
                $user->update();
                
                return back()->with('exchange-success', 'Penukaran berhasil diproses! silahkan pantau status dan detail penukaran di dashboard');
            } else {
                return back()->with('exchange-failed', 'Waste Point yang anda miliki masih kurang, ayo tukar sampah sekarang!');  
            }
        } else {
            return back()->with('admin-restricted', 'Penukaran produk tidak diproses untuk Admin');
        }
    }

    public function search(Request $request)
    {
        $search = $request->keyword;
        $products = Product::where('product_name', 'like', '%' . $search . '%')->get();
        return view('penukaran.produk', [
            'products' => $products,
        ]);
    }
}
