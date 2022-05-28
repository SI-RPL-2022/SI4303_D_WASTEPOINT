<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductExchange;
use Illuminate\Http\Request;

class PengelolaanPenukaranProdukController extends Controller
{
    public function index()
    {
        $number = 1;
        $product_exchanges = ProductExchange::orderBy('id', 'desc')->get();
        return view('admin.penukaran_produk', [
            'product_exchanges' => $product_exchanges,
            'number' => $number
        ]);
    }

    public function detail($id)
    {
        $product_exchanges = ProductExchange::where('id', $id)->get();
        return view('admin.detail_penukaran_produk', [
            'product_exchanges' => $product_exchanges,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // status
        $status = ['Dalam proses', 'Dalam pengiriman', 'Selesai'];

        $product_exchange = ProductExchange::where('id', $id)->first();

        if ($product_exchange->status == $status[2]) {
            if ($request->status == $status[0] || $request->status == $status[1] || $request->status == $status[2]) {
                return back()->with('update_fail', 'Update gagal! Penukaran produk sudah selesai');
            }
        } else if ($product_exchange->status == $status[1]) {
            if ($request->status == $status[0] || $request->status == $status[1]) {
                return back()->with('update_fail', 'Update gagal! Produk sudah dalam pengiriman');
            } else {
                $product_exchange->update(['status' => $request->status]);
                return back()->with('update_success', 'Update data penukaran produk berhasil!');
            }
        } else if ($product_exchange->status == $status[0]) {
            if ($request->status == $status[2]) {
                return back()->with('update_fail', 'Update gagal! Pengiriman produk belum dilakukan');
            } else if ($request->status == $status[1]) {
                $product_exchange->update([
                    'status' => $request->status,
                    'invoice_number' => 'INV/'. rand(2022, 2022).'/'.rand(1, 9999),
                ]);
                return back()->with('update_success', 'Update data penukaran produk berhasil!');
            } else {
                return back()->with('update_warning', 'Status penukaran produk belum diupdate!');
            }
        }
    }

    public function delete($id) {
        ProductExchange::where('id', $id)->delete();
        return back()->with('update_success', 'Data penukran produk berhasil dihapus!');
    }
}
