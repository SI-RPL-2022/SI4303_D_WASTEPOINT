@extends('layouts.admin')

@section('title', 'Data Blog')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title text-center py-2">Tambah Data Blog</h3>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div id="managed-blog" class="card shadow mb-4 p-3 mx-auto">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label fw-bolder">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh:Trik Agar Tempat Sampah Tidak Berbau" autofocus required value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="konten" class="form-label fw-bolder">Isi Konten</label>
                                <input id="konten" type="hidden" name="konten" >
                                <trix-editor input="konten" class="bg-white"></trix-editor>
                                @error('konten')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label fw-bolder">Gambar Blog</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="mb-2">
                                <button type="submit" class="btn btn-green exchange py-2 fw-bold rounded ">Tambah Blog</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection