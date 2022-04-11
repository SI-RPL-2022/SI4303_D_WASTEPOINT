@extends('layouts.admin')

@section('title', 'Dashboard')
    
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="admin-title mb-2 mb-sm-0">Data Produk</h3>
            <a href="data-produk-pemilahan/create" class="d-sm-block d-sm-inline-block btn btn-sm btn-green shadow-sm py-2 px-3 rounded">
                Tambah Produk <i class="bi bi-file-plus"></i>
            </a>
        </div>

        @if (session('create_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('create_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @elseif (session('update_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('update_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif

        @if ($products->isEmpty())
            <div class="text-center my-3 pb-4">
                <img src="{{ asset('images/product-illustration.png') }}" width="350" class="mb-2">
                <h6 class="mt-3 text-dark fw-bold">Belum ada produk yang ditambahkan</h6>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Poin</th>
                                            <th>Stok Tersedia</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->price_point }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                <a href="data-produk-pemilahan/detail/{{ $product->id }}" class="btn btn-secondary mb-2 mb-lg-0">Detail</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- delete modal -->
    <div class="modal modal-delete fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModalLabel">Hapus Data Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus permanen data produk?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    @foreach ($products as $product)
                        <form action="data-produk-pemilahan/delete/{{ $product->id }}" method="POST">
                             @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection