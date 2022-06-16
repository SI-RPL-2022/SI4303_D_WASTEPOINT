@extends('layouts.user')

@section('title') {{ 'Edit Profil - '.Auth::user()->name }} @endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-12">
            <h4 class="fw-bold my-4">Profil User</h4>
            @if (session('update_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('update_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="border rounded p-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <section id="avatar" class="mb-4">
                                <label for="file" class="fw-bold form-label">Avatar</label>
                                <div class="d-flex flex-column">
                                    @if (!Auth::user()->avatar)
                                        <img src="{{ asset('images/avatar-default.png') }}" alt="avatar-user" class="avatar-update border rounded">
                                    @else
                                        <img src="{{ asset('avatars/'.Auth::user()->avatar) }}" alt="avatar-user" class="avatar-update border rounded">
                                    @endif
                                    <input type="file" name="avatar" id="avatar" class="mt-4">
                                    @error('avatar')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <p class="mt-2"><small>Gambar berukuran tidak lebih dari 4MB dan berasio 1:1 untuk hasil yang maksimal.</small></p>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-8 col-12">
                            <section id="name" class="mb-3">
                                <label for="name" class="fw-bold form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </section>
                            <section id="name" class="mb-3">
                                <label for="email" class="fw-bold form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ Auth::user()->email }}" disabled>
                                <p class="mt-2 text-muted"><small>Silahkan hubungi <a href="https://wa.me/08111761179" class="text-green hover-none">admin</a> jika ingin mengubah email Anda.</small></p>
                            </section>
                            <section id="name" class="mb-3">
                                <label for="nomorhp" class="fw-bold form-label">Nomor Hp</label>
                                <input type="text" class="form-control" id="nomorhp" name="nomorhp" placeholder="Masukkan nomor hp" value="{{ Auth::user()->nomorhp }}">
                                @error('nomorhp')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </section>
                            <section id="name" class="mb-4">
                                <label for="address" class="fw-bold form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Contoh: Jl. Rusa raya No. 71, Kel. Sertajaya, Kec. Cikarang Timur, Kab. Bekasi, Jawa Barat" rows="3">{{ Auth::user()->address }}</textarea>
                                @error('address')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </section>
                            <button type="submit" class="btn btn-green w-20 py-2 px-4 fw-bolder rounded exchange">Simpan Perubahan</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection