@extends('layouts.admin')

@section('title', 'Data Blog')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title text-center py-2">Detail Data Blog</h3>
        </div>

        @if (session('update_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('update_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        
        <div class="row">
            {{-- <div class="col-12"> --}}
                {{-- <div id="detail" class="card shadow mb-4 p-3"> --}}
                    {{-- <div class="card-body"> --}}
                        <div class="row align-items-center">
                            @foreach ($blogs as $blog)
                                <div class="col-lg-4 col-12">
                                    <div class="border rounded p-4 mb-4 mb-lg-0">
                                        <img src="/blogs/{{ $blog->image }}" class="w-100" alt="gambar-Blog">
                                    </div>
                                    <br>
                                </div>
                                {{-- <div class="col-lg-6 col-12 ms-auto"> --}}
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="judul" class="form-label fw-bolder">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh: Tempat Sampah Kapsul 3-in-1" required value="{{ $blog->judul }}">
                                            @error('judul')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            
                                            <label for="konten" class="form-label fw-bolder">Isi Konten</label>
                                            <input id="konten" type="hidden" name="konten">
                                            <trix-editor input="konten" placeholder="Isi Konten" required>{!! $blog->konten !!}</trix-editor>
                                            @error('konten')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="image" class="form-label fw-bolder">Gambar</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            @error('image')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <button type="submit" class="btn btn-green w-50 py-2 fw-bold rounded">Update Data Blog</button>
                                            
                                        </div>
                                    </form>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection