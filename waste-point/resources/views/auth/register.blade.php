@extends('layouts.auth')

@section('title', 'Register')
    
@section('content')
    <div class="card auth mx-auto p-3 rounded shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold">Register</h2>
            <p class="mb-4">Silahkan mendaftar akun Waste Point untuk memulai aktivitas Anda.</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bolder">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" autofocus value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bolder">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nomorhp" class="form-label fw-bolder">Nomor HP</label>
                    <input type="text" class="form-control" id="nomorhp" name="nomorhp" placeholder="Masukkan nomor hp" value="{{ old('nomorhp') }}">
                    @error('nomorhp')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label fw-bolder">Alamat</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Contoh: Jl. Rusa raya No. 71, Kel. Sertajaya, Kec. Cikarang Timur, Kab. Bekasi, Jawa Barat" rows="3" value="{{ old('address') }}"></textarea>
                    @error('address')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-bolder">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" value="{{ old('password') }}">
                    <i class="fa-solid fa-eye-slash" id="togglePassword" onclick="togglePassword()"></i>
                    @error('password')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-green w-100 py-2 fw-bold rounded">Register</button>
                </div>
                <p class="text-center mb-0">Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-decoration-none hover-none text-green fw-bold">Masuk</a>
                </p>
            </form>
        </div>
    </div>
@endsection