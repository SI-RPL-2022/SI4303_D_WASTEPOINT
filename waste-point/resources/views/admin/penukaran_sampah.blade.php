@extends('layouts.admin')

@section('title', 'Data Penukaran Sampah')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mb-5">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title py-2">Data Penukaran Sampah</h3>
        </div>

        @if ($wastes->isEmpty())
            <div class="text-center my-3 pb-4">
                <img src="{{ asset('images/waste-illustration.svg') }}" width="250" class="mb-2">
                <h6 class="mt-3 text-dark fw-bold">Data penukaran sampah masih kosong</h6>
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
                                        <th>Nama Pengguna</th>
                                        <th>Berat</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wastes as $waste)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $waste->users->name }}</td>
                                            <td>{{ $waste->weight }}</td>
                                            <td>{{ $waste->category }}</td>
                                            @if ($waste->status == 'Berhasil')
                                                <td class="text-success">{{ $waste->status }}</td>        
                                            @elseif ($waste->status == 'Dalam penjemputan')
                                                <td class="text-secondary">{{ $waste->status }}</td>
                                            @else
                                                <td class="text-danger">{{ $waste->status }}</td>
                                            @endif
                                            <td>
                                                <a href="data-penukaran-sampah/detail/{{$waste->id}}" class="btn btn-secondary mb-2 mb-lg-0">Detail</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</button>
                                            </td>
                                        </tr>
                                        <!-- delete modal -->
                                        <div class="modal modal-delete fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold" id="deleteModalLabel">Hapus Data Sampah</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus permanen data penukaran sampah?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="data-penukaran-sampah/delete/{{$waste->id}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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