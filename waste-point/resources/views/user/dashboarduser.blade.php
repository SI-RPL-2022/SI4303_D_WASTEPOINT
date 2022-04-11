@extends('layouts.user')

@section('content')
    <section id="main-profile" class="mb-5">
        <div class="jumbotron bg-green rounded p-4 mt-4">
            <h2 class="fw-bold mb-2">Halo, {{ Auth::user()->name }} !</h2>
            <div class="d-md-flex align-items-center justify-content-between">
                <p class="mb-md-0 mb-2">Tukarkan sampahmu hanya dari rumah dan dapatkan poin dengan cepat.</p>
                <a href="" class="d-md-block d-md-inline-block btn btn-yellow py-2 px-3 rounded">Konversi Poin</a>
            </div>
            <hr class="mt-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start align-items-center">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p class="mb-0 fw-bold">Total WastePoin</p>
                                <img src="{{ asset('images/points.svg') }}" alt="point-logo">
                            </div>
                            <hr class="mb-3">
                            <h3 class="text-yellow fw-bold">4830 <span class="text-dark opacity-75 fs-6">Poin</span></h3> 
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p class="mb-0 fw-bold">Berat sampah ditukar</p>
                                <img src="{{ asset('images/trash.svg') }}" alt="trash-logo">
                            </div>
                            <hr class="mb-3">
                            <h3 class="text-green fw-bold">49 <span class="text-dark opacity-75 fs-6">Kilogram</span></h3> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="waste-exchange">
        <h4 class="fw-bold mb-4">Penukaran Sampah</h4>
        @if ($wastes->isEmpty())
            <p class="py-3 mb-0"><em>Belum ada riwayat penukaran sampah</em></p>
        @else
            <div class="card border rounded p-4">
                @foreach ($wastes as $waste)
                    <div class="mb-3">
                        @if ($waste->status == 'Selesai')
                            <small class="text-success fw-bold py-2 px-3 rounded" style="background-color: rgb(225, 248, 228)">{{ $waste->status }}</small>        
                        @elseif ($waste->status == 'Dalam penjemputan')
                            <small class="text-primary fw-bold py-2 px-3 rounded" style="background-color: rgb(223, 230, 241)">{{ $waste->status }}</small>
                        @else
                            <small class="text-danger fw-bold py-2 px-3 rounded" style="background-color: rgb(249,242,244)">{{ $waste->status }}</small>
                        @endif
                    </div>
                    <div class="container bg-gray px-4 py-3 rounded">
                        <div class="d-md-flex d-block justify-content-between align-items-end">
                            <div class="mb-2">
                                <small>{{ $waste->created_at }} WIB</small>
                                <div class="mt-2"><span class="fw-bold">{{ $waste->weight }}</span> Kilogram</div>
                                <div class="mt-2">Kategori <span class="fw-bold">{{ $waste->category }}</span></div>
                                @if ($waste->status == 'Selesai')
                                    <div class="mt-2">Total WastePoin <span class="fw-bold">
                                        @if ($waste->category == $kategori[0])
                                            {{ $waste->weight * 5}}
                                        @elseif ($waste->category == $kategori[1])
                                           {{ $waste->weight * 8}}
                                        @elseif ($waste->category == $kategori[2])
                                           {{ $waste->weight * 10}}
                                        @elseif ($waste->category == $kategori[3])
                                           {{ $waste->weight * 10}}
                                        @endif
                                    </span></div>
                                @endif
                            </div>
                            <span>
                                @if ($waste->status == 'Selesai')
                                    <a href="user/penukaran-sampah/detail/{{ $waste->id }}" class="btn btn-green rounded px-4">Lihat Detail</a>
                                @else 
                                    <a href="https://wa.me/08111761179" class="btn-link me-3">Hubungin admin</a>
                                    <a href="user/penukaran-sampah/detail/{{ $waste->id }}" class="btn btn-green rounded px-4">Lihat Detail</a>
                                @endif
                            </span>
                        </div>
                    </div>
                    @if ($wastes->count() > 1)
                        <hr class="my-4"> 
                    @endif
                @endforeach 
                <div class="pagination mt-3 text-center justify-content-end">
                    {{ $wastes->links() }}
                </div>
            </div>
        @endif
    </section>
@endsection