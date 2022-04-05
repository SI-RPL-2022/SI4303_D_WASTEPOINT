@extends('layouts.app')

@section('title', 'Penukaran Sampah')
    
@section('content')
    <section id="main-view" class="py-5 mb-4">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-12 mt-lg-3 mt-0">
                <h2 class="fw-bold mb-md-3 mb-2">Penukaran <span class="text-green">Sampah</span></h2>
                <p class="mb-4">Kami berkomitmen dan bertanggung jawab memastikan sampah 
                    <span class="d-xl-block d-inline">anorganik Anda didaur ulang secara optimal. Penukaran sampah di</span> 
                    <span class="d-xl-block d-inline">Waste Point memerhatikan beberapa ketentuan dan persyaratan</span> 
                    <span class="d-xl-block d-inline"> yang perlu dipenuhi oleh pengguna.</span>
                </p>
                <a href="#input-data" class="btn btn-green py-2 px-4 mb-lg-0 mb-5 rounded">
                    <span class="align-middle">Masukkan data sampah</span>
                    <span class="fa fa-arrow-down ms-2 align-middle" aria-hidden="true"></span>
                </a>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/penukaran-sampah.svg') }}" alt="waste-illustration" class="w-100">
            </div>
        </div>
    </section>

    <section id="flow-view" class="py-4 mb-5">
        <div class="text-center mb-5">
            <h4 class="fw-bold">Alur Penukaran</h4>
            <p class="opacity-75">Alur penukaran sampah Anda mulai dari awal proses hingga akhir</p>
        </div>
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-4 col-12 mb-md-0 mb-4 text-center">
                <img src="{{ asset('images/number-one.svg') }}" class="mb-3">
                <h5 class="fw-bold">Mulai pilah sampah</h5>
                <p class="opacity-75">Pilah sampah anorganik berdasarkan 
                    <span class="d-xl-block d-inline">syarat sampah yang bisa ditukarkan</span> 
                    <span class="d-xl-block d-inline">dan timbang total berat sampah Anda</span>
                </p>
            </div>
            <div class="col-lg-4 col-12 mb-md-0 mb-4 text-center">
                <img src="{{ asset('images/number-two.svg') }}" class="mb-3">
                <h5 class="fw-bold">Isi form data sampah</h5>
                <p class="opacity-75">Masukkan data-data sampah yang  
                    <span class="d-xl-block d-inline">diperlukan pada form input data</span> 
                    <span class="d-xl-block d-inline">sampah dengan benar</span>
                </p>
            </div>
            <div class="col-lg-4 col-12 text-center">
                <img src="{{ asset('images/number-three.svg') }}" class="mb-3">
                <h5 class="fw-bold">Penjemputan</h5>
                <p class="opacity-75">Sampah anda akan kami proses dan 
                    <span class="d-xl-block d-inline">dilakukan penjemputan dalam waktu</span> 
                    <span class="d-xl-block d-inline">paling lama 1x24 jam</span>
                </p>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-4 col-12 mb-md-0 mb-4">
                <img src="{{ asset('images/number-four.svg') }}" class="mb-3">
                <h5 class="fw-bold">Dapat Point</h5>
                <p class="opacity-75">Setelah sampah dijemput dan status  
                    <span class="d-xl-block d-inline">penukaran Anda berhasil, Anda akan</span> 
                    <span class="d-xl-block d-inline">langsung mendapatkan point</span>
                </p>
            </div>
            <div class="col-lg-4 col-12">
                <img src="{{ asset('images/number-five.svg') }}" class="mb-3">
                <h5 class="fw-bold">Pengelolaan selanjutnya</h5>
                <p class="opacity-75">Sampah anorganik Anda akan kami 
                    <span class="d-xl-block d-inline">proses bersama mitra pengelolaan</span> 
                    <span class="d-xl-block d-inline">sampah untuk didaur ulang segera</span>
                </p>
            </div>
        </div>
    </section>

    <section id="waste-type" class="py-4 mb-5">
        <div class="text-center mb-5">
            <h4 class="fw-bold">Jenis sampah yang bisa ditukar</h4>
            <p class="opacity-75">Berikut ini merupakan kelompok sampah yang dapat Anda tukarkan dengan point</p>
        </div>
        <div class="row justify-content-center text-center w-100">
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 mb-xl-0 mb-4">
                <img src="{{ asset('images/waste-kertas.svg') }}" class="rounded shadow-sm">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 mb-xl-0 mb-4">
                <img src="{{ asset('images/waste-plastik.svg') }}" class="rounded shadow-sm">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 mb-xl-0 mb-4">
                <img src="{{ asset('images/waste-metal.svg') }}" class="rounded shadow-sm">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 mb-xl-0 mb-4">
                <img src="{{ asset('images/waste-jelantah.svg') }}" class="rounded shadow-sm">
            </div>
        </div>
    </section>

    @guest
        <div id="input-data" class="pt-5 mb-2 text-center">
            <a href="{{ route('login') }}" class="btn btn-green w-20 py-2 px-4 fw-bold rounded mt-5">Login untuk penukaran sampah</a>
        </div>
    @else
        <section id="input-data" class="pt-5 pb-4 mb-2">
            <div class="mb-5 pt-5">
                <h4 class="fw-bold text-center">Masukkan data sampah</h4>
                <p class="opacity-75 text-center">Tunggu apalagi? yuk langsung isi form data sampah dan dapatkan point sebanyak-banyaknya!</p>
                @if (session('exchange-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="container">
                            {{ session('exchange-success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('admin-restricted'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <div class="container">
                            {{ session('admin-restricted') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 col-12">
                    <form action="{{ Route('penukaran-sampah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="weight" class="form-label fw-bolder">Berat sampah</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="weight" name="weight" value="1" min="1" placeholder="Masukkan berat sampah" value="{{ old('waste_weight') }}">
                                <span class="input-group-text">Kg</span>
                                @error('weight')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label fw-bolder">Kategori sampah</label>
                            <select class="form-select" id="category" name="category" aria-label="Default select example" value="{{ old('categories') }}">
                                <option selected disabled>-- Pilih kategori --</option>
                                <option value="Kertas">Kertas</option>
                                <option value="Plastik">Plastik</option>
                                <option value="Kaleng">Kaleng</option>
                                <option value="Jelantah">Jelantah</option>
                            </select>
                            @error('category')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bolder">Foto sampah</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label fw-bolder">Alamat</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Contoh: Jl. Rusa raya No. 71, Kel. Sertajaya, Kec. Cikarang Timur, Kab. Bekasi, Jawa Barat" value="{{ old('address') }}">{{ Auth::user()->address }}</textarea>
                            @error('address')
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
                            <button type="submit" class="btn btn-green w-20 py-2 px-4 fw-bold rounded">Input data sampah</button>                            
                        </div>
                    </form>
                </div>
                <div class="col-6 d-lg-block d-none ps-5">
                    <img src="{{ asset('images/waste-illustration.svg') }}" alt="waste-illustration">
                </div>
            </div>
        </section>
    @endguest
@endsection