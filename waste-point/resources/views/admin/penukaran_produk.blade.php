@extends('layouts.admin')

@section('title', 'Data Penukaran Produk')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mb-5">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title py-2">Data Penukaran Produk</h3>
        </div>

        @if ($product_exchanges->isEmpty())
            <div class="text-center my-3 pb-4">
                <img src="{{ asset('images/product-illustration.png') }}" width="300" class="mb-2">
                <h6 class="mt-3 text-dark fw-bold">Data penukaran produk masih kosong</h6>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_exchanges as $product_exchange)
                                        <tr>
                                            <th scope="row">{{ $number++ }}</th>
                                            <td>{{ $product_exchange->users->name }}</td>
                                            <td>{{ $product_exchange->products->product_name }}</td>
                                            <td>{{ $product_exchange->quantity }}</td>
                                            @if ($product_exchange->status == 'Selesai')
                                                <td class="text-success">{{ $product_exchange->status }}</td>        
                                            @elseif ($product_exchange->status == 'Dalam pengiriman')
                                                <td class="text-primary">{{ $product_exchange->status }}</td>
                                            @else
                                                <td class="text-danger">{{ $product_exchange->status }}</td>
                                            @endif
                                            <td>
                                                <a href="data-penukaran-produk/detail/{{ $product_exchange->id }}" class="btn btn-secondary mb-lg-0 mb-2 me-lg-1 me-0">Detail</a>
                                                <form action="data-penukaran-produk/delete/{{ $product_exchange->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>

@endsection