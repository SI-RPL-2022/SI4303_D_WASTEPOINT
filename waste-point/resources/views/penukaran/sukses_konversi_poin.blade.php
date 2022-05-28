@extends('layouts.user')

@section('title', 'Konversi Poin Sukses')
    
@section('content')
    <div class="p-3 my-4">
        <h3 class="fw-bold mb-5 text-center">Konversi Poin Berhasil</h3>
        <div class="text-center mb-5">
            <img src="{{ asset('images/success-convert.svg') }}">
        </div>
        @foreach ($conversions as $conversion)    
            <div class="p-3 mb-5">
                <hr class="my-3 hr-dashboard">
                <div class="container">
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Waktu Konversi</p>
                        <p class="mb-md-2 mb-4">{{ $conversion->created_at }}</p>
                    </div>
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Sisa WastePoin</p>
                        <p class="mb-md-2 mb-4">
                            <img src="{{ asset('images/points.svg') }}">
                            <span class="align-middle">
                                {{ Auth::user()->waste_poins }}
                            </span>
                        </p>
                    </div>
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Jumlah Ditukar</p>
                        <p class="mb-md-2 mb-4">
                            <img src="{{ asset('images/points.svg') }}">
                            <span class="align-middle">
                                - {{ $conversion->total_points }}
                            </span>
                        </p>
                    </div>
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Bank</p>
                        <p class="mb-md-2 mb-4">{{ $conversion->bank }}</p>
                    </div>
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Nomor Rekening</p>
                        <p class="mb-md-2 mb-4">{{ $conversion->account_number }}</p>
                    </div>
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Total Hasil Konversi</p>
                        <p class="mb-md-2 mb-4">Rp{{ $conversion->conversion_result }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            <a href="{{ Route('user.dashboard-user') }}" class="btn btn-secondary rounded px-3 me-md-2 me-0 d-md-inline d-block">Kembali ke dashboard</a>
            <button class="btn btn-green rounded px-3 mt-md-0 mt-2 button-full" onclick="window.print()">Cetak detail konversi</button>
        </div>
    </div>
@endsection