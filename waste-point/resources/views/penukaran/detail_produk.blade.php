@extends('layouts.app')

@section('title') {{ 'Detail produk - ' . $product->product_name }} @endsection
    
@section('content')
    @if (session('exchange-success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <div class="container">
                {{ session('exchange-success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('exchange-failed'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <div class="container">
                {{ session('exchange-failed') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('admin-restricted'))
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            <div class="container">
                {{ session('admin-restricted') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section id="detail-view" class="pt-4 pb-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 col-12">
                <img src="/products/{{ $product->image }}" class="p-3 border rounded detail-produk">
            </div>
            <div class="col-lg-8 col-12 ps-lg-0 ps-auto mt-lg-0 mt-3">
                <div class="d-md-flex d-block mb-2">
                    <h3 class="text-green fw-bold mb-lg-0 mb-3">{{ $product->product_name }}</h3>
                    @if ($product->stock >= 10)
                        <small class="text-success fw-bold py-2 px-3 rounded ms-auto" style="background-color: rgb(25, 135, 84, 0.15)">Stok Tersedia</small>        
                    @elseif ($product->stock >= 1 && $product->stock < 10)
                        <small class="text-warning fw-bold py-2 px-3 rounded ms-auto" style="background-color: rgba(255, 193, 7, 0.15)">Stok < {{ $product->stock }}</small>
                    @else
                        <small class="text-danger fw-bold py-2 px-3 rounded ms-auto" style="background-color: rgb(220,53,69, 0.15)">Stok Habis</small>
                    @endif
                </div>
                <p class="fw-bold mb-0 mt-lg-0 mt-3">WastePoin</p>
                <p class="mb-3 fs-5 fw-bold">
                    <img src="{{ asset('images/points.svg') }}">
                    <span class="align-middle">{{ $product->price_point }}</span>
                </p>
                <p class="fw-bold">{{ $product->description }}</p>
                <p>Pengiriman produk akan dilakukan paling lambat dalam waktu 3 X 24 Jam hari kerja. Jika produk tidak tersedia, penukaran ini dapat dibatalkan oleh Admin dan WastePoin akan dikembalikan seluruhnya.</p>
            </div>
        </div>
    </section>
    
    <section id="exchange-view" class="py-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-syarat-tab" data-bs-toggle="tab" data-bs-target="#nav-syarat" type="button" role="tab" aria-controls="nav-syarat" aria-selected="true">Informasi</button>
                <button class="nav-link" id="nav-penukaran-tab" data-bs-toggle="tab" data-bs-target="#nav-penukaran" type="button" role="tab" aria-controls="nav-penukaran" aria-selected="false">Penukaran</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-syarat" role="tabpanel" aria-labelledby="nav-syarat-tab">
                <h4 class="mt-4 py-2 fw-bold">Syarat & Ketentuan</h4>
                <p>Persyaratan yang perlu anda penuhi untuk penukaran WastePoin dengan Produk Pemilahan Sampah.</p>
                <ol>
                    <li class="mb-2">Anda membutuhkan <strong>{{ $product->price_point }} WastePoin</strong> untuk penukaran produk ini</li>
                    <li class="mb-2">Alamat yang terdaftar pada akun anda sudah sesuai</li>
                    <li class="mb-2">Nomor HP atau Telefon yang terdaftar pada akun sudah sesuai</li>
                    <li class="mb-2">Segala pertanyaan dan masukan dapat anda ajukan <a class="btn-link" href="https://wa.me/08111761179" target="_blank">disini</a></li>
                </ol>
                <h4 class="my-4 py-2 fw-bold">Mitra Pengiriman</h4>
                <div class="row align-items-center gap-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/New_Logo_JNE.png" alt="jne" class="partner">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/6/6a/LogoLionParcel.svg/628px-LogoLionParcel.svg.png" alt="lion" class="partner">
                    <img src="https://1.bp.blogspot.com/-sIyg2VqFi4k/W6xfKzUlmzI/AAAAAAAAO-g/MmsDRJxqCm4BLEzwGYy_sqT5MxIHQTrbQCLcBGAs/w1200-h630-p-k-no-nu/SICEPAT.png" alt="sicepat" class="partner">
                    <img src="https://pentasada.co.id/wp-content/uploads/2020/06/Logo-JT-2-1.jpg" alt="jnt" class="partner">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Ninjavan.svg" alt="ninja" class="partner">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/00/Pos-Indonesia.svg/1200px-Pos-Indonesia.svg.png" alt="posindonesia" class="partner">
                </div>
                <h4 class="mt-5 mb-4 py-2 fw-bold">Mitra Spesial</h4>
                <img src="https://waste4change.com/2.8.assets/img/logo/logo-W4C_179_web.png" alt="waste4change" class="partner">
            </div>
            <div class="tab-pane fade" id="nav-penukaran" role="tabpanel" aria-labelledby="nav-penukaran-tab">
                @guest
                    <div id="input-data" class="pt-5 mb-2 text-center">
                        <a href="{{ route('login') }}" class="btn btn-green w-20 py-2 px-4 fw-bold rounded mt-5">Silahkan login untuk penukaran produk</a>
                    </div>
                @else
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-12">
                            <h4 class="mt-4 py-2 fw-bold">Penukaran</h4>
                            <p>Lengkapi data yang dibutuhkan dibawah ini untuk penukaran produk.</p>
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="user" class="form-label fw-bolder">Data Pengguna</label>
                                    <div class="border rounded p-4 mb-2">
                                        <p class="mb-2">{{ Auth::user()->name }}</p>
                                        <p class="mb-2">{{ Auth::user()->no_hp }}</p>
                                        <p class="mb-0">{{ Auth::user()->address }}</p>
                                    </div>
                                    <small>Ubah data pada menu <a href="" class="btn-link">edit profil</a> jika belum sesuai</small>
                                </div>
                                <div class="mb-4">
                                    <label for="postal_code" class="form-label fw-bolder">Kode pos</label>
                                    <input type="text" class="form-control mb-2" id="postal_code" name="postal_code" placeholder="Masukkan kode pos sesuai alamat Anda" @if (Auth::user()->postal_code != '') value="{{ Auth::user()->postal_code }}" @endif value="{{ old('postal_code') }}">
                                    <small>Referensi <a href="https://kodeposindo.com/" target="_blank" class="btn-link">kode pos</a></small>
                                    @error('postal_code')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label fw-bolder">Jumlah penukaran</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Jumlah produk" value="1" min="1" value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="note" class="form-label fw-bolder">Catatan</label>
                                    <input type="text" class="form-control" id="note" name="note" placeholder="Catatan tambahan, boleh diisi atau engga" value="{{ old('note') }}">
                                    @error('note')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-green w-20 py-2 px-4 fw-bold rounded exchange">Pesan produk</button>                            
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-12 order-lg-last order-first">
                            <div class="card rounded mt-4">
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
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </section>
@endsection