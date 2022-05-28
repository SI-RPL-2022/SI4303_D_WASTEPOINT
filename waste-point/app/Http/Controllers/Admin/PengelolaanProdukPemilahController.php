<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PengelolaanProdukPemilahController extends Controller
{
    public function index()

    {
        $number = 1;
        $products = Product::all();
        return view('admin.produk_pemilahan', [
            'products' => $products,
            'number' => $number
        ]);

    }

    public function create()
    {
        return view('admin.tambah_produk_pemilahan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['required'],
            'price_point' => ['required'],
            'stock' => ['required', 'min:1'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,PNG,JPG,JPEG', 'max:2048'],
            'description' => ['required']
        ]);
        
        $product_image = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $product_image);
        
        Product::create([
            'product_name' => $request->product_name,
            'slug' => SlugService::createSlug(Product::class, 'slug', $request->product_name),
            'price_point' => $request->price_point,
            'stock' => $request->stock,
            'image' => $product_image,
            'description' => $request->description,
        ]);
        return redirect('/admin/data-produk-pemilahan')->with('create_success', 'Data produk berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $products = Product::where('id', $id)->get();
        return view('admin.detail_produk_pemilahan', [
            'products' => $products,
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($request->image != null) {
            $product_image = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $product_image);
        
            Product::where('id', $id)->update([
                'product_name' => $request->product_name,
                'slug' => SlugService::createSlug(Product::class, 'slug', $request->product_name),
                'price_point' => $request->price_point,
                'stock' => $request->stock,
                'image' => $product_image,
                'description' => $request->description,
            ]);
        } else {
            Product::where('id', $id)->update([
                'product_name' => $request->product_name,
                'slug' => SlugService::createSlug(Product::class, 'slug', $request->product_name),
                'price_point' => $request->price_point,
                'stock' => $request->stock,
                'description' => $request->description,
            ]);
        }
        return back()->with('update_success', 'Update data produk berhasil!');
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return back()->with('update_success', 'data produk berhasil dihapus');
    }
}
