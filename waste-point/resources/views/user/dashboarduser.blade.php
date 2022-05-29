@extends('layouts.user')

@section('content')
    <section id="main-profile" class="mb-5">
        <div class="jumbotron bg-green rounded p-4 mt-4">
            <h2 class="fw-bold mb-2">Halo, {{ Auth::user()->name }} !</h2>
            <div class="d-md-flex align-items-center justify-content-between">
                <p class="mb-md-0 mb-2">Tukarkan sampahmu hanya dari rumah dan dapatkan poin dengan cepat.</p>
                <a href="" class="d-md-block d-md-inline-block btn btn-yellow py-2 px-3 rounded">Konversi Poin</a>
            </div>
            <hr class="mt-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start align-items-center">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p class="mb-0 fw-bold">Total WastePoin</p>
                                <img src="{{ asset('images/points.svg') }}" alt="point-logo">
                            </div>
                            <hr class="mb-3">
                            <h3 class="text-yellow fw-bold">4830 <span class="text-dark opacity-75 fs-6">Poin</span></h3> 
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p class="mb-0 fw-bold">Berat sampah ditukar</p>
                                <img src="{{ asset('images/trash.svg') }}" alt="trash-logo">
                            </div>
                            <hr class="mb-3">
                            <h3 class="text-green fw-bold">49 <span class="text-dark opacity-75 fs-6">Kilogram</span></h3> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="waste-exchange" class="mb-5">
        <h4 class="fw-bold mb-4"><i class="bi bi-trash3-fill text-green me-2"></i>Penukaran Sampah</h4>
        @if ($wastes->isEmpty())
            <p class="py-3 mb-0"><em>Belum ada riwayat penukaran sampah</em></p>
        @else
            <div class="card border rounded p-4">
                @foreach ($wastes as $waste)
                    <div class="mb-3">
                        @if ($waste->status == 'Selesai')
                            <small class="text-success fw-bold py-2 px-3 rounded" style="background-color: rgb(25, 135, 84, 0.15)">{{ $waste->status }}</small>        
                        @elseif ($waste->status == 'Dalam penjemputan')
                            <small class="text-primary fw-bold py-2 px-3 rounded" style="background-color: rgb(223, 230, 241)">{{ $waste->status }}</small>
                        @else
                            <small class="text-danger fw-bold py-2 px-3 rounded" style="background-color: rgb(220, 53, 69, 0.15)">{{ $waste->status }}</small>
                        @endif
                    </div>
                    <div class="container bg-gray px-4 py-3 rounded">
                        <div class="d-md-flex d-block justify-content-between align-items-end">
                            <div class="mb-2">
                                <small>{{ $waste->created_at }}</small>
                                <h6 class="mt-2">
                                    <span class="fw-bold">{{ $waste->weight }}</span> Kg 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg>
                                    <span class="fw-bold">{{ $waste->category }}</span>
                                </h6>
                                @if ($waste->status == 'Selesai')
                                    <div class="mt-2">Total WastePoin 
                                        <img src="{{ asset('images/points.svg') }}" class="ms-2">
                                        <span class="fw-bold align-middle">
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
                                    </div>
                                @endif
                            </div>
                            <span>
                                @if ($waste->status != 'Selesai')
                                    <a href="https://wa.me/08111761179" class="btn-link me-3">Hubungin admin</a>
                                @endif
                                <a href="user/penukaran-sampah/detail/{{ $waste->id }}" class="btn btn-green rounded px-4 mt-sm-0 mt-2">Lihat Detail</a>
                            </span>
                        </div>
                    </div>
                    @if ($wastes->count() > 1)
                        <hr class="my-4"> 
                    @endif
                @endforeach 
                <div class="pagination mt-3 text-center justify-content-end">
                    {{ $wastes->links() }}
                </div>
            </div>
        @endif
    </section>

    <section id="waste-exchange">
        <h4 class="fw-bold mb-4"><i class="bi bi-bag-check-fill text-green me-2"></i>Penukaran Produk Pemilahan Sampah</h4>
        @if ($product_exchanges->isEmpty())
            <p class="py-3 mb-0"><em>Belum ada riwayat penukaran produk</em></p>
        @else
            <div class="card border rounded p-4">
                @foreach ($product_exchanges as $product_exchange)
                    <div class="mb-3">
                        @if ($product_exchange->status == 'Selesai')
                            <small class="text-success fw-bold py-2 px-3 rounded" style="background-color: rgb(25, 135, 84, 0.15)">{{ $product_exchange->status }}</small>        
                        @elseif ($product_exchange->status == 'Dalam pengiriman')
                            <small class="text-primary fw-bold py-2 px-3 rounded" style="background-color: rgb(223, 230, 241)">{{ $product_exchange->status }}</small>
                        @else
                            <small class="text-danger fw-bold py-2 px-3 rounded" style="background-color: rgb(220,53,69, 0.15)">{{ $product_exchange->status }}</small>
                        @endif
                    </div>
                    <div class="container bg-gray px-4 py-3 rounded">
                        <div class="d-md-flex d-block justify-content-between align-items-end">
                            <div class="mb-2">
                                <small>{{ $product_exchange->created_at }}</small>
                                <h6 class="mt-3">
                                    <span class="fw-bold">{{ $product_exchange->quantity }}</span> Pcs
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg>
                                    <span class="fw-bold">{{ $product_exchange->products->product_name }}</span>
                                </h6>
                                <div class="mt-3"> 
                                    <img src="{{ asset('images/points.svg') }}">
                                    <span class="fw-bold align-middle">{{ $product_exchange->total_points }}</span>
                                </div>
                            </div>
                            <span>
                                @if ($product_exchange->status != 'Selesai')
                                    <a href="https://wa.me/08111761179" class="btn-link me-3">Hubungin admin</a>
                                @endif
                                <a href="user/penukaran-produk/detail/{{ $product_exchange->id }}" class="btn btn-green rounded px-4 mt-sm-0 mt-2">Lihat Detail</a>
                            </span>
                        </div>
                    </div>
                    @if ($product_exchanges->count() > 1)
                        <hr class="my-4"> 
                    @endif
                @endforeach 
                <div class="pagination mt-3 text-center justify-content-end">
                    {{ $product_exchanges->links() }}
                </div>
            </div>
        @endif
    </section>
@endsection