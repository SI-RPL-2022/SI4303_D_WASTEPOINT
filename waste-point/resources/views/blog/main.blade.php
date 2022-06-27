@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
    <section id="main-view" class="py-5 mb-3">
        <div class="row justify-content-center">
            <div class="text-center">
                <h2 class="fw-bold mb-md-3 mb-2">Blog Pilihan <span class="text-green">Waste Point</span></h2>
                <p class="mb-4">Informasi terkait pemilahan sampah, daur ulang dan edukasi mengenai sampah
                    <span class="d-xl-block d-inline">lainnya khusus untuk Anda.</span> 
                </p>
                <div class="col-lg-5 col-12 mx-auto">
                    <form action="{{ route('blog.search') }}" method="get" class="d-flex">
                        <div class="input-group mb-2 shadow-sm rounded">
                            <input type="search" class="form-control" placeholder="Cari kata kunci.." name="keyword" value="{{ request('keyword') }}">
                            <button class="btn btn-green text-white" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="list_blog" class="pb-2 mb-2">
        <hr class="mb-4 text-muted">
        <div class="row justify-content-center">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('blogs/'.$blog->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text text-muted"><small>{{ $blog->created_at }}</small></p>
                            <h5 class="card-title fw-bold"><a href="{{ route('blog.read', $blog->slug) }}" class="text-decoration-none text-black">{{ $blog->judul }}</a></h5>
                            <p class="card-text">{{ $blog->excerpt }}</p>
                        </div>
                        <div class="card-footer py-3">
                            <a href="{{ route('blog.read', $blog->slug) }}" class="text-decoration-none">
                                <span class="text-green">Selengkapnya</span>
                                <span class="fa fa-arrow-right ms-2 align-middle text-green" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection