<?php

namespace App\Http\Controllers\Penukaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PointConvert;

class KonversiPoinController extends Controller
{
    public function index()
    {
        return view('penukaran.konversi_poin');
    }

    public function store(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();

        $request->validate([
            'total_points' => ['required', 'min:50', 'integer'],
            'bank' => ['required'],
            'account_number' => ['required', 'between:10,15'],
        ]);

        if (!auth()->user()->is_admin) {
            if (auth()->user()->waste_poins >= $request->total_points && $request->total_points >= 50) {
                $conversions = PointConvert::create([
                    'user_id' => auth()->user()->id,
                    'total_points' => $request->total_points,
                    'bank' => $request->bank,
                    'account_number' => $request->account_number,
                    'conversion_result' => (($request->total_points * 1000) - 2500),
                    'status' => 'Berhasil',
                ]);

                $conversions->save();
                $data = $conversions->id;

                $user->waste_poins -= $request->total_points;
                $user->update();
                
                return redirect('konversi-poin/success/'.$data);
                
            } else {
                return redirect('konversi-poin#konversi')->with('convert-failed', 'Jumlah poin yang ingin dikonversi lebih dari total poin yang Anda miliki, ayo mulai rajin tukar sampah!');  
            }
        } else {
            return redirect('konversi-poin#konversi')->with('admin-restricted', 'Konversi poin tidak diproses untuk Admin');
        }
    }

    public function success($id)
    {
        $conversions = PointConvert::where('id', $id)->get();
        return view('penukaran.sukses_konversi_poin', [
            'conversions' => $conversions,
        ]);
    }
}
