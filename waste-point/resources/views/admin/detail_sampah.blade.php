@extends('layouts.admin')

@section('title', 'Data Penukaran Sampah')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4">
            <h3 class="admin-title text-center py-2">Detail Data Sampah</h3>
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
                            @foreach ($wastes as $waste)
                                <div class="col-lg-5 col-12">
                                    <div class="border rounded p-4 mb-4">
                                        <h5 class="fw-bold mb-3">Data Penukar</h5>
                                        <p class="mb-2">{{ $waste->users->name }}</p>
                                        <p class="mb-2">{{ $waste->users->nomorhp }}</p>
                                        <p class="mb-0">{{ $waste->users->address }}</p>
                                    </div>
                                    <div class="border rounded p-4 mb-4 mb-lg-0">
                                        <img src="/wastes/{{ $waste->image }}" class="w-100" alt="gambar-sampah">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ms-auto">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="weight" class="form-label fw-bolder">Berat sampah</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="weight" name="weight" min="1" value="{{ $waste->weight }}">
                                                <span class="input-group-text">Kg</span>
                                                @error('weight')
                                                    <div class="text-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="category" class="form-label fw-bolder">Kategori sampah</label>
                                            <input type="text" class="form-control" id="category" name="category" value="{{ $waste->category }}" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="note" class="form-label fw-bolder">Catatan</label>
                                            <input type="text" class="form-control" id="note" name="note" value="{{ $waste->note }}" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="status" class="form-label fw-bolder">Status</label>
                                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                <option @if ($waste->status == "Belum diverifikasi") {{ "selected" }} value="Belum diverifikasi" @endif value="Belum diverifikasi">Belum diverifikasi</option> 
                                                <option @if ($waste->status == "Dalam penjemputan") {{ "selected" }}  value="Dalam penjemputan" @endif value="Dalam penjemputan">Dalam penjemputan</option>
                                                <option @if ($waste->status == "Selesai") {{ "selected" }} value="Selesai" @endif value="Selesai">Selesai</option> 
                                            </select>
                                            @error('status')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-green w-100 py-2 px-4 fw-bold rounded">Update Data Sampah</button>                            
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