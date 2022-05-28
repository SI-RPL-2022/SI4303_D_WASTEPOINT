@extends('layouts.user')

@section('title', 'Detail Penukaran Produk')

@section('content')
    @if (session('update_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container">
                {{ session('update_success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="bg-green rounded p-3 text-center my-4">
        <h3 class="fw-bold mb-0">Detail Penukaran Produk</h3>
    </div>
    @foreach ($product_exchanges as $product_exchange)    
        <div class="border rounded p-lg-4 p-2 text-center mb-4">
            <img src="/products/{{ $product_exchange->products->image }}" alt="produk" class="rounded detail-produk">
        </div>
        <div class="border rounded p-3 mb-5">
            @if ($product_exchange->status == $status[2])
                <span class="fw-bold">✅ Penukaran {{ $product_exchange->status }}</span>
            @elseif ($product_exchange->status == $status[1])
                <span class="fw-bold">🚚 Penukaran sedang {{ $product_exchange->status }}</span>
            @else
                <span class="fw-bold">❌ Penukaran {{ $product_exchange->status }}</span>
            @endif
            <hr class="my-3 hr-dashboard">
            <div class="container">
                @if ($product_exchange->status == $status[1] || $product_exchange->status == $status[2])
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Nomor Invoice</p>
                        <p class="mb-md-2 mb-4">{{ $product_exchange->invoice_number }}</p>
                    </div>
                @endif
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Waktu Penukaran</p>
                    <p class="mb-md-2 mb-4">{{ $product_exchange->created_at }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Nama Produk</p>
                    <p class="mb-md-2 mb-4">{{ $product_exchange->products->product_name }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Jumlah</p>
                    <p class="mb-md-2 mb-4">{{ $product_exchange->quantity }} pcs</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Total WastePoin</p>
                    <p class="mb-md-2 mb-4">
                        <img src="{{ asset('images/points.svg') }}">
                        <span class="align-middle">
                            {{ $product_exchange->total_points }}
                        </span>
                    </p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Alamat</p>
                    <p class="mb-md-2 mb-4">{{ $product_exchange->users->address }}</p>
                </div>
            </div>
        </div>
        <div class="text-center mb-5">
            @if ($product_exchange->status == $status[0])
                <a href="https://wa.me/08111761179" class="btn btn-secondary rounded px-3 me-md-2 me-0 d-md-inline d-block">Hubungin admin</a>
            @elseif ($product_exchange->status == $status[1])
                <button type="button" class="btn btn-green rounded px-3 mt-md-0 mt-2 button-full" data-bs-toggle="modal" data-bs-target="#confirmModal">Pesanan diterima</button>
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="confirmModalLabel">Konfirmasi Penerimaan Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            Dengan melanjutkan dialog ini anda telah memastikan bahwa produk hasil penukaran telah anda terima dengan baik.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-green">Ya, Setuju</button>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif ($product_exchange->status == $status[2])
                <a href="{{ Route('penukaran-produk') }}" class="btn btn-green rounded px-4">Lihat produk lainnya</a>
            @endif
        </div>
    @endforeach
@endsection