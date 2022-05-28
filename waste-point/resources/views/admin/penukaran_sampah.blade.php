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
                            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
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
                                            <th scope="row">{{ $number++ }}</th>
                                            <td>{{ $waste->users->name }}</td>
                                            <td>{{ $waste->weight }}</td>
                                            <td>{{ $waste->category }}</td>
                                            @if ($waste->status == 'Selesai')
                                                <td class="text-success">{{ $waste->status }}</td>        
                                            @elseif ($waste->status == 'Dalam penjemputan')
                                                <td class="text-primary">{{ $waste->status }}</td>
                                            @else
                                                <td class="text-danger">{{ $waste->status }}</td>
                                            @endif
                                            <td>
                                                <a href="data-penukaran-sampah/detail/{{$waste->id}}" class="btn btn-secondary mb-2 mb-lg-0">Detail</a>
                                                <form action="data-penukaran-sampah/delete/{{$waste->id}}" method="POST" class="d-inline">
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