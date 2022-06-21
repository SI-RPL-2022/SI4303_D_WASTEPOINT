@extends('layouts.app')

@section('title') {{ $blog->judul.' - Waste Point Blog' }} @endsection

@section('content')
    <section id="read_blog" class="pt-4 pb-5">
        <div class="text-center">
            <p class="text-muted">{{ $blog->created_at }}</p>
            <h2 class="fw-bold">{{ $blog->judul }}</h2>
            <div class="blog-image py-4">
                <img src="{{ asset('blogs/'.$blog->image) }}" class="rounded" alt="blog-image">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-8 mx-auto col-12 blog-content">
                {!! $blog->konten !!}
            </div>
        </div>
    </section>
@endsection