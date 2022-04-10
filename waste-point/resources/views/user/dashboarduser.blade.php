@extends('layouts.user')


    
@section('content')

<section id="main-profile" class="mb-5">
    <div class="jumbotron bg-green rounded p-4 mt-5">
        <h2 class="fw-bold mb-2">Halo, {{ Auth::user()->name }} !</h2>
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <p class="mb-md-0 mb-2">Tukarkan sampahmu hanya dari rumah dan dapatkan poin dengan cepat.</p>
            <a href="" class="d-md-block d-md-inline-block btn btn-yellow py-2 px-3 rounded">Konversi Poin</a>
        </div>
        <hr class="my-4">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-start align-items-center">
                    <div class="col-lg-6  mb-lg-0 mb-4">
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

{{-- <section id="waste-exchange">
    <h4 class="fw-bold mb-4">Penukaran Sampah</h4>
    @if (!$wastes->isEmpty())
        <p class="py-3 mb-0"><em>Belum ada riwayat penukaran sampah</em></p>
    @else
        <div class="card border p-3">
        @foreach ($wastes as $waste)
                
        @endforeach 
        </div>
    @endif
</section> --}}