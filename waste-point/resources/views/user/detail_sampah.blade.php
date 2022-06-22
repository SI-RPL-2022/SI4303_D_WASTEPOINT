@extends('layouts.user')

@section('title', 'Detail Penukaran Sampah')

@section('content')
    @if (session('rating_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container">
                {{ session('rating_success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="bg-green rounded p-3 text-center my-4">
        <h2 class="fw-bold mb-0">Detail Penukaran Sampah</h2>
    </div>
    @foreach ($wastes as $waste)    
        <div class="border rounded p-lg-4 p-2 text-center mb-4">
            <img src="/wastes/{{ $waste->image }}" class="rounded detail-sampah">
        </div>
        <div class="border rounded p-3 mb-5">
            @if ($waste->status == 'Selesai')
                <span class="fw-bold">✅ Penukaran {{ $waste->status }}</span>
            @elseif ($waste->status == 'Dalam penjemputan')
                <span class="fw-bold">🚚 Penukaran sedang {{ $waste->status }}</span>
            @else
                <span class="fw-bold">❌ Penukaran {{ $waste->status }}</span>
            @endif
            <hr class="my-3 hr-dashboard">
            <div class="container">
                @if ($waste->status == 'Dalam penjemputan' || $waste->status == 'Selesai')
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Nomor Pick Up</p>
                        <p class="mb-md-2 mb-4">{{ $waste->pick_up_number }}</p>
                    </div>
                @endif
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Waktu Penukaran</p>
                    <p class="mb-md-2 mb-4">{{ $waste->created_at }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Berat Sampah</p>
                    <p class="mb-md-2 mb-4">{{ $waste->weight }} Kg</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Kategori Sampah</p>
                    <p class="mb-md-2 mb-4">{{ $waste->category }}</p>
                </div>
                <div class="d-md-flex d-block justify-content-between">
                    <p class="opacity-75 mb-3">Alamat</p>
                    <p class="mb-md-2 mb-4">{{ $waste->users->address }}</p>
                </div>
                @if ($waste->status == 'Selesai')
                    <div class="d-md-flex d-block justify-content-between">
                        <p class="opacity-75 mb-3">Total WastePoin</p>
                        <p class="mb-md-2 mb-4">
                            <img src="{{ asset('images/points.svg') }}">
                            <span class="align-middle">
                                @if ($waste->category == $kategori[0])
                                    {{ $waste->weight * 5}}
                                @elseif ($waste->category == $kategori[1])
                                    {{ $waste->weight * 8}}
                                @elseif ($waste->category == $kategori[2])
                                    {{ $waste->weight * 10}}
                                @elseif ($waste->category == $kategori[3])
                                    {{ $waste->weight * 10}}
                                @endif
                            </span>
                        </p>
                    </div>
                @endif
            </div>
        </div>
        <div class="text-center mb-5">
            @if ($waste->status == 'Belum diverifikasi' || $waste->status == 'Dalam penjemputan')
                <a href="https://wa.me/08111761179" class="btn btn-green rounded px-5 py-2">Hubungin admin</a>
            @elseif ($waste->status == 'Selesai' && !$waste->rating)
                <button type="button" class="btn btn-green rounded px-5 py-2 mt-md-0 mt-2 button-full" data-bs-toggle="modal" data-bs-target="#confirmModal">Beri ulasan</button>
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="confirmModalLabel">Ulasan Anda untuk Penukaran Ini</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('waste_rating', $waste->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="rating" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>   
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="5" checked />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                                <hr class="text-muted">
                                <div class="mb-3 text-start">
                                    <label for="feedback" class="form-label fw-bold">Feedback</label>
                                    <textarea class="form-control" name="feedback" id="feedback" cols="30" rows="5" placeholder="Berikan masukan atau pesan yang ingin Anda sampaikan"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-green px-4">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ Route('penukaran-sampah') }}" class="btn btn-green rounded px-5 py-2">Tukar lagi !!</a>
            @endif
        </div>
    @endforeach
@endsection

