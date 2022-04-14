@extends('layouts.user')

@section('content')

    <div class="bg-green rounded p-3 text-center my-4">
        <h2 class="fw-bold mb-0">Detail Penukaran Sampah</h2>
    </div>
    @foreach ($wastes as $waste)    
        <div class="border rounded p-lg-4 p-2 text-center mb-4">
            <img src="/wastes/{{ $waste->image }}" class="rounded detail-sampah">
        </div>
        <div class="border rounded p-3 mb-5">
            @if ($waste->status == 'Selesai')
                <span class="fw-bold">✅ Penukaran {{ $waste->status }}</span>
            @elseif ($waste->status == 'Dalam penjemputan')
                <span class="fw-bold">🚚 Penukaran sedang {{ $waste->status }}</span>
            @else
                <span class="fw-bold">❌ Penukaran {{ $waste->status }}</span>
            @endif
            <hr class="my-3 hr-dashboard">
            <div class="container">
                @if ($waste->status == 'Dalam penjemputan' || $waste->status == 'Selesai')
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Nomor Pick Up</p>
                        <p class="mb-md-2 mb-4">{{ $waste->pick_up_number }}</p>
                    </div>
                @endif
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Waktu Penukaran</p>
                    <p class="mb-md-2 mb-4">{{ $waste->created_at }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Berat Sampah</p>
                    <p class="mb-md-2 mb-4">{{ $waste->weight }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Kategori Sampah</p>
                    <p class="mb-md-2 mb-4">{{ $waste->category }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Alamat</p>
                    <p class="mb-md-2 mb-4">{{ $waste->users->address }}</p>
                </div>
                @if ($waste->status == 'Selesai')
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Total WastePoin</p>
                        <p class="mb-md-2 mb-4">
                            <img src="{{ asset('images/points.svg') }}">
                            <span class="align-middle">
                                @if ($waste->category == $kategori[0])
                                    {{ $waste->weight * 5}}
                                @elseif ($waste->category == $kategori[1])
                                    {{ $waste->weight * 8}}
                                @elseif ($waste->category == $kategori[2])
                                    {{ $waste->weight * 10}}
                                @elseif ($waste->category == $kategori[3])
                                    {{ $waste->weight * 10}}
                                @endif
                            </span>
                        </p>
                    </div>
                @endif
            </div>
        </div>
        @if ($waste->status == 'Belum diverifikasi' || $waste->status == 'Dalam penjemputan')
        <div class="text-center">
            <a href="https://wa.me/08111761179" class="btn btn-green rounded px-4">Hubungin admin</a>
        </div>
        @else
            <div class="text-center">
                <a href="{{ Route('penukaran-sampah') }}" class="btn btn-green rounded px-4">Tukar sampah lagi</a>
            </div>
        @endif
    @endforeach
@endsection

