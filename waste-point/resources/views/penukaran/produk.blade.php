@extends('layouts.app')

@section('title', 'Penukaran Produk')
    
@section('content')
    <section id="main-view" class="py-5 mb-4">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-12 mt-lg-3 mt-0">
                <h2 class="fw-bold mb-md-3 mb-2">Penukaran <span class="text-green">Produk</span></h2>
                <p class="mb-4">Tukarkan point yang Anda miliki dengan berbagai produk dengan 
                    <span class="d-xl-block d-inline">berbagai pilihan produk pemilahan sampah berkualitas</span> 
                    <span class="d-xl-block d-inline">untuk mendukung pemilahan sampah rumah tangga.</span> 
                </p>
                <a href="#list_product" class="btn btn-green py-2 px-4 mb-lg-0 mb-5 rounded">
                    <span class="align-middle">Lihat Produk</span>
                    <span class="fa fa-arrow-down ms-2 align-middle" aria-hidden="true"></span>
                </a>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/product-illustration.png') }}" alt="waste-illustration" class="w-100">
            </div>
        </div>
    </section>

    <section id="flow-view" class="py-4 mb-5">
        <div class="text-center mb-5">
            <h4 class="fw-bold">Alur Penukaran</h4>
            <p class="opacity-75">Alur penukaran point menjadi produk mulai dari awal proses hingga akhir</p>
        </div>
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-4 col-12 mb-md-0 mb-4 text-center">
                <img src="{{ asset('images/number-one.svg') }}" class="mb-3">
                <h5 class="fw-bold">Pilih produk</h5>
                <p class="opacity-75">Pilih produk-produk yang tersedia 
                    <span class="d-xl-block d-inline">sesuai keinginan Anda untuk</span> 
                    <span class="d-xl-block d-inline">memulai aksi pemilahan sampah</span>
                </p>
            </div>
            <div class="col-lg-4 col-12 mb-md-0 mb-4 text-center">
                <img src="{{ asset('images/number-two.svg') }}" class="mb-3">
                <h5 class="fw-bold">Lengkapi form</h5>
                <p class="opacity-75">Lengkapi data yang diperlukan seperti   
                    <span class="d-xl-block d-inline">kode pos, jumlah dan catatan jika</span> 
                    <span class="d-xl-block d-inline">dibutukan untuk melakukan penukaran</span>
                </p>
            </div>
            <div class="col-lg-4 col-12 text-center">
                <img src="{{ asset('images/number-three.svg') }}" class="mb-3">
                <h5 class="fw-bold">Pesanan diproses</h5>
                <p class="opacity-75">Produk yang Anda pilih akan langsung
                    <span class="d-xl-block d-inline">kami proses langsung dan dilakukan</span> 
                    <span class="d-xl-block d-inline">pengiriman ke lokasi Anda</span>
                </p>
            </div>
        </div>
    </section>

    <section id="list_product" class="pt-5 pb-4 mb-2">
        <div class="mb-5 pt-5">
            <div class="row justify-content-between mb-5">
                <div class="col-lg-4 col-12 mb-lg-0 mb-4">
                    <div class="sticky-top">
                        <h4 class="fw-bold">Pilihan produk</h4>
                        <p>Produk pemilahan sampah yang bisa ditukarkan dengan point hasil akumulasi penukaran sampah</p>
                        @auth
                            <div class="card rounded">
                                <div class="card-body d-flex">
                                    <p class="mb-0">WastePoin</p>
                                    <div class="ms-auto">
                                        <img src="{{ asset('images/points.svg') }}"> 
                                        <span class="align-middle">
                                            @if (!Auth::user()->waste_poins == null) {{ Auth::user()->waste_poins }} @else 0 @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ Route('penukaran-sampah') }}" class="btn btn-green w-100">Dapatkan poin lagi</a>
                                </div>
                            </div>
                        @else
                            <div class="card rounded">
                                <p class="mb-0 py-3 text-center">Sepertinya kamu belum masuk menggunakan akun Waste Point, Yuk login dulu!</p>
                                <div class="card-footer">
                                    <a href="{{ Route('login') }}" class="btn btn-green w-100">Login sekarang</a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <form action="{{ Route('penukaran-produk.search') }}" method="get" class="d-flex">
                        <div class="input-group mb-2 shadow-sm rounded">
                            <input type="search" class="form-control" placeholder="Cari nama produk.." name="keyword" value="{{ request('keyword') }}">
                            <button class="btn btn-green text-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                    @if ($products->isEmpty())
                        <div class="text-center my-5">
                            <h5 class="fw-bold py-4">Saat ini produk belum tersedia</h5>
                        </div>
                    @else
                        <div class="row justify-content-between mt-4">
                            @foreach ($products as $product)
                                <div class="col-lg-6 col-12 mb-4">
                                    <div class="card rounded">
                                        <img src="/products/{{ $product->image }}" class="card-img-top">
                                        <div class="card-body">
                                            <h6 class="card-title fw-bold">{{ $product->product_name }}</h6>
                                            <p class="card-text">
                                                <img src="{{ asset('images/points.svg') }}" alt="">
                                                <span class="align-middle">{{ $product->price_point }}</span>
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item btn-gray">
                                                @if (Route::is('penukaran-produk.search'))
                                                    <a href="{{ $product->slug }}" class="w-100 btn fw-bold">Tukarkan</a>
                                                @else
                                                    <a href="penukaran-produk/{{ $product->slug }}" class="w-100 btn fw-bold">Tukarkan</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection