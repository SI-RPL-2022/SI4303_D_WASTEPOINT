@extends('layouts.app')

@section('title', 'Konversi Poin')
    
@section('content')
    <section id="main-view" class="py-5 mb-4">
        <div class="row justify-content-between">
            <div class="col-lg-7 col-12 mt-lg-3 mt-0">
                <h2 class="fw-bold mb-md-3 mb-2">Konversi <span class="text-yellow">Poin</span></h2>
                <p class="mb-4">WastePoin yang Anda miliki dapat ditukarkan menjadi uang 
                    <span class="d-xl-block d-inline">yang diproses ke rekening bank Anda dengan cepat.</span> 
                </p>
                <a href="#konversi" class="btn btn-green py-2 px-4 mb-lg-0 mb-5 rounded">
                    <span class="align-middle">Lakukan konversi poin</span>
                </a>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/coins.jpeg') }}" alt="convertion-illustration" class="detail-sampah">
            </div>
        </div>
    </section>

    <section id="flow-view" class="py-4 mb-5">
        <div class="text-center mb-5">
            <h4 class="fw-bold">Alur Konversi</h4>
            <p class="opacity-75">Alur konversi poin Anda mulai dari awal proses hingga akhir</p>
        </div>
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-4 col-12 mb-md-0 mb-4 text-center">
                <img src="{{ asset('images/number-one.svg') }}" class="mb-3">
                <h5 class="fw-bold">Masukkan jumlah poin</h5>
                <p class="opacity-75">Tentukan jumlah poin yang ingin  
                    <span class="d-xl-block d-inline">dikonversi dengan minimum penukaran</span> 
                    <span class="d-xl-block d-inline">sebesar 50 WastePoin</span>
                </p>
            </div>
            <div class="col-lg-4 col-12 mb-md-0 mb-4 text-center">
                <img src="{{ asset('images/number-two.svg') }}" class="mb-3">
                <h5 class="fw-bold">Masukkan data rekening bank</h5>
                <p class="opacity-75">Pilih tipe bank yang menjadi tujuan konversi  
                    <span class="d-xl-block d-inline">poin dan masukkan data rekening</span> 
                    <span class="d-xl-block d-inline">bank dengan sesuai untuk diproses</span>
                </p>
            </div>
            <div class="col-lg-4 col-12 text-center">
                <img src="{{ asset('images/number-three.svg') }}" class="mb-3">
                <h5 class="fw-bold">Konversi berhasil</h5>
                <p class="opacity-75">Konversi poin akan diproses dengan cepat ke
                    <span class="d-xl-block d-inline">rekening anda dengan tambahan</span> 
                    <span class="d-xl-block d-inline">biaya admin sebesar Rp 2.500</span>
                </p>
            </div>
        </div>
    </section>

    <section id="konversi" class="pt-5 pb-2 mb-2">
        <div class="mb-5 pt-5">
            <h4 class="fw-bold text-center">Konversi poin jadi uang</h4>
            <p class="text-center">
                Penukaran poin akan langsung diproses dengan tambahan biaya administrasi sebesar Rp2500 berlaku untuk seluruh tipe bank.
                <span class="d-xl-block d-inline">Kalkulasi konversi poin untuk 1 poinnya senilai <span class="text-green fw-bold">Rp1000</span>.</span>
            </p>
        </div>
        @if (session('convert-failed'))
            <div class="row justify-content-center">
                <div class="col-md-10 col-12">
                    <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                        <div class="container">
                            {{ session('convert-failed') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @elseif (session('admin-restricted'))
            <div class="row justify-content-center">
                <div class="col-md-10 col-12">
                    <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                        <div class="container">
                            {{ session('admin-restricted') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center mb-5">
            <div class="col-md-3 col-12">
                <div class="card rounded shadow-sm">
                    <div class="card-body text-center p-2">
                        WastePoin:
                        <img src="{{ asset('images/points.svg') }}"> 
                        <span class="align-middle fw-bold">
                            @if (!Auth::user()->waste_poins == null) {{ Auth::user()->waste_poins }} @else 0 @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="total_points" class="form-label fw-bolder">Jumlah poin</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="total_points" name="total_points" value="50" min="50" placeholder="Masukkan poin yang ingin ditukarkan" value="{{ old('total_points') }}">
                            <span class="input-group-text">WastePoin</span>
                            @error('total_points')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bank" class="form-label fw-bolder">Bank</label>
                        <select class="form-select" id="bank" name="bank" aria-label="Default select example" value="{{ old('bank') }}">
                            <option selected disabled>-- Pilih bank tujuan konversi --</option>
                            <option value="Bank Mandiri">Bank Mandiri</option>
                            <option value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                            <option value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>
                            <option value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                            <option value="Bank Syariah Indonesia (BSI)">Bank Syariah Indonesia (BSI)</option>
                            <option value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                            <option value="Bank Niaga">Bank Niaga</option>
                        </select>
                        @error('bank')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="account_number" class="form-label fw-bolder">Nomor rekening</label>
                        <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Masukkan nomor rekening valid" value="{{ old('account_number') }}">
                        @error('account_number')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-green w-20 py-2 px-4 fw-bold rounded exchange">Konversi poin</button>                            
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection