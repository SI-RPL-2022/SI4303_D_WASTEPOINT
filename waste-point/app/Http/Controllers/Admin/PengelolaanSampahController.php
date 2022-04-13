<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Waste;
use App\Models\User;

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

    public function detail($id)
    {
        $wastes = Waste::where('id', $id)->get();
        return view('admin.detail_sampah', [
            'wastes' => $wastes,
        ]);
    }

    public function update(Request $request, $id)
    {
        // status
        $status = ['Belum diverifikasi', 'Dalam penjemputan', 'Selesai'];
        $kategori = ['Kertas', 'Plastik', 'Kaleng', 'Jelantah'];

        $waste = Waste::where('id', $id)->first();

        if ($waste->status == $status[2]) {
            if ($request->status == $status[0] || $request->status == $status[1] || $request->status == $status[2]) {
                return back()->with('update_fail', 'Update gagal! Penukaran sampah sudah selesai');
            }
        } else if ($waste->status == $status[1]) {
            if ($request->status == $status[0] || $request->status == $status[1]) {
                return back()->with('update_fail', 'Update gagal! Penukaran sudah dalam penjemputan');
            } else {
                $waste->update(['status' => $request->status]);
                $user = User::where('id', $waste->user_id)->first();
                
                if ($request->category == $kategori[0]) {
                    $user->waste_poins += $request->weight * 5;
                    $user->update();
                } else if ($request->category == $kategori[1]) {
                    $user->waste_poins += $request->weight * 8;
                    $user->update();
                } else if ($request->category == $kategori[2]) {
                    $user->waste_poins += $request->weight * 10;
                    $user->update();
                } else {
                    $user->waste_poins += $request->weight * 10;
                    $user->update();
                }
                
                return back()->with('update_success', 'Update data penukaran sampah berhasil!');
            }
        } else if ($waste->status == $status[0]) {
            if ($request->status == $status[2]) {
                return back()->with('update_fail', 'Update gagal! Penjemputan sampah belum dilakukan');
            } else if ($request->status == $status[1]) {
                $waste->update([
                    'status' => $request->status,
                    'pick_up_number' => rand(),
                ]);
                return back()->with('update_success', 'Update data penukaran sampah berhasil!');
            } else {
                return back()->with('update_warning', 'Status penukaran sampah belum diupdate!');
            }
        }
    }

    public function delete($id)
    {
        Waste::where('id'. $id)->delete();
        return back()->with('update_success', 'Data sampah berhasil dihapus');
    }
}
