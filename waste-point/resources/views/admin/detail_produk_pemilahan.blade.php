@extends('layouts.admin')

@section('title', 'Data Produk')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title text-center py-2">Detail Data Produk</h3>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div id="detail" class="card shadow mb-4 p-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            @foreach ($products as $product)
                                <div class="col-lg-5 col-12">
                                    <div class="border rounded p-4 mb-4 mb-lg-0">
                                        <img src="/products/{{ $product->image }}" class="w-100" alt="gambar-produk">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ms-auto">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label fw-bolder">Nama Produk</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Contoh: Tempat Sampah Kapsul 3-in-1" required value="{{ $product->product_name }}">
                                            @error('product_name')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="price_point" class="form-label fw-bolder">Jumlah Poin</label>
                                            <input type="number" class="form-control" id="price_point" name="price_point" placeholder="Contoh: 2000" required value="{{ $product->price_point }}">
                                            @error('price_point')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock" class="form-label fw-bolder">Jumlah Stok</label>
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Contoh: 20" required value="{{ $product->stock }}">
                                            @error('stock')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label fw-bolder">Deskripsi Produk</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi produk" required>{{ $product->description }}</textarea>
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
                                            <button type="submit" class="btn btn-green w-100 py-2 fw-bold rounded">Update Data Produk</button>
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