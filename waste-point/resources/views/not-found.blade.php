@extends('layouts.user')

@section('title', 'Yang Dicari Gaada')

@section('content')
    <section id="not-found">
        <div class="my-5">
            <div class="row justify-content-center">
                <div class="col-md-4 col-12">
                    <img src="{{ asset('images/404.svg') }}" class="w-100">
                </div>
                <h4 class="mt-4 mb-5 fw-bold text-center">Gaada apa-apa disini</h4>
                <div class="col-md-4 col-12">
                    <a href="/" class="btn btn-green rounded w-100 fw-bold">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </section>
@endsection