<?php

namespace App\Http\Controllers\Penukaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waste;

class SampahController extends Controller
{
    public function index()
    {
        return view('penukaran.sampah');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'weight' => ['required', 'min:1', 'integer'],
            'category' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,PNG,JPG,JPEG', 'max:2048'],
        ]);
        if (!auth()->user()->is_admin) {
            $waste_image = time().'.'.$request->image->extension();
            $request->image->move(public_path('wastes'), $waste_image);
            Waste::create([
                'user_id' => auth()->user()->id,
                'weight' => $request->weight,
                'category' => $request->category,
                'address' => $request->address,
                'image' => $waste_image,
                'note' => $request->note,
            ]);
            return redirect('penukaran-sampah#input-data')->with('exchange-success', 'Penukaran berhasil diproses! silahkan pantau status dan detail penukaran di dashboard');
        } else {
            return redirect('penukaran-sampah#input-data')->with('admin-restricted', 'Penukaran sampah tidak diproses untuk Admin');
        }
    }
}

