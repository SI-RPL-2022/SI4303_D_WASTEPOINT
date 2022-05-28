@extends('layouts.admin')

@section('title', 'Data Penukaran Produk')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title text-center py-2">Detail Data Penukaran Produk</h3>
        </div>

        @if (session('update_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('update_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @elseif (session('update_fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('update_fail') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @elseif (session('update_warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('update_warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div> 
        @endif
        
        <div class="row">
            <div class="col-12">
                <div id="detail" class="card shadow mb-4 p-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            @foreach ($product_exchanges as $product_exchange)
                                <div class="col-lg-5 col-12">
                                    <div class="border rounded p-4 mb-4">
                                        <h5 class="fw-bold mb-3">Data Penukar</h5>
                                        <p class="mb-2">{{ $product_exchange->users->name }}</p>
                                        <p class="mb-2">{{ $product_exchange->users->nomorhp }}</p>
                                        <p class="mb-2">{{ $product_exchange->users->address }}</p>
                                    </div>
                                    <div class="border rounded p-4 mb-4 mb-lg-0">
                                        <h5 class="fw-bold rounded mb-3">Gambar Produk</h5>
                                        <img src="/products/{{ $product_exchange->products->image }}" class="w-100" alt="produk">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ms-auto">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <label for="created_at" class="form-label fw-bolder">Waktu Penukaran</label>
                                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $product_exchange->created_at }} WIB" readonly>
                                            </div>
                                            <div class="mb-4">
                                                <label for="product_name" class="form-label fw-bolder">Pilihan Produk</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product_exchange->products->product_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="quantity" class="form-label fw-bolder">Jumlah</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="{{ $product_exchange->quantity }}" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="note" class="form-label fw-bolder">Catatan</label>
                                            <input type="text" class="form-control" id="note" name="note" value="{{ $product_exchange->note }}" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="total_points" class="form-label fw-bolder">Total WastePoin</label>
                                            <input type="number" class="form-control" id="total_points" name="total_points" value="{{ $product_exchange->total_points }}" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="status" class="form-label fw-bolder">Status</label>
                                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                <option @if ($product_exchange->status == "Dalam proses") {{ "selected" }} value="Dalam proses" @endif value="Dalam proses">Dalam proses</option> 
                                                <option @if ($product_exchange->status == "Dalam pengiriman") {{ "selected" }}  value="Dalam pengiriman" @endif value="Dalam pengiriman">Dalam pengiriman</option>
                                                <option @if ($product_exchange->status == "Selesai") {{ "selected" }} value="Selesai" @endif value="Selesai">Selesai</option> 
                                            </select>
                                            @error('status')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-green w-100 py-2 px-4 fw-bold rounded">Update Data Penukaran Produk</button>                            
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