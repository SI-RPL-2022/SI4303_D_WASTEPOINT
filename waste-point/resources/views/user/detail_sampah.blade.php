@extends('layouts.user')

@section('title', 'Detail Penukaran Sampah')

@section('content')
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
        @if ($waste->status == 'Belum diverifikasi' || $waste->status == 'Dalam penjemputan')
        <div class="text-center">
            <a href="https://wa.me/08111761179" class="btn btn-green rounded px-4">Hubungin admin</a>
        </div>
        @else
            <div class="text-center">
                <a href="#" class="btn btn-green-secondary rounded px-4 me-2" type="submit" data-bs-toggle="modal" data-bs-target="#RateModal">Beri Rating</a>
                <a href="{{ Route('penukaran-sampah') }}" class="btn btn-green rounded px-4">Tukar lagi !!</a>
            </div>
        @endif
    @endforeach

    <div class="modal fade" id="RateModal" tabindex="-1" aria-labelledby="RateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title fw-bold" id="RateModalLabel">Konfirmasi Logout</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                   
                    <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="star-rating">
                              <span class="fa fa-star-o" data-rating="1"></span>
                              <span class="fa fa-star-o" data-rating="2"></span>
                              <span class="fa fa-star-o" data-rating="3"></span>
                              <span class="fa fa-star-o" data-rating="4"></span>
                              <span class="fa fa-star-o" data-rating="5"></span>
                              <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                            </div>
                          </div>
                        </div>

                  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    {{-- <form action="{{ route('logout') }}" method="POST"> --}}
                        @csrf
                      <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

