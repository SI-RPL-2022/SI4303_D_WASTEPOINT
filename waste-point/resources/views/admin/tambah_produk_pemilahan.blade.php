@extends('layouts.admin')

@section('title', 'Data Produk Pemilahan')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title text-center py-2">Tambah Data Produk</h3>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div id="managed" class="card shadow mb-4 mx-auto p-3">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label fw-bolder">Nama Produk</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Contoh: Tempat Sampah Kapsul 3-in-1" autofocus required value="{{ old('product_name') }}">
                                @error('product_name')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price_point" class="form-label fw-bolder">Jumlah Poin</label>
                                <input type="number" class="form-control" id="price_point" name="price_point" placeholder="Contoh: 2000" required value="{{ old('price_point') }}">
                                @error('price_point')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label fw-bolder">Jumlah Stok</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Contoh: 20" required value="{{ old('stock') }}">
                                @error('stock')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bolder">Deskripsi Produk</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi produk" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label fw-bolder">Gambar Produk</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="btn btn-green w-100 py-2 fw-bold rounded">Tambah Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection