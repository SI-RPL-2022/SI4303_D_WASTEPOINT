@extends('layouts.user')

@section('title', 'Riwayat Konversi Poin')
    
@section('content')
    @if ($conversions->isEmpty())
        <div class="text-center mt-5">
            <img src="{{ asset('images/coins.jpeg') }}" width="280" class="mb-2">
            <h6 class="mt-3 mb-5 fw-bold">Ooops, belum ada riwayat konversi poin pada akun Anda...</h6>
            <a href="{{ Route('konversi-poin') }}" class="btn btn-yellow">Konversi poin sekarang</a>
        </div>
    @else
        <div class="my-4">
            <h4 class="fw-bold mb-4">Riwayat Konversi Poin</h4>
        </div>
        <div class="table-responsive-md">
            <table class="table align-middle table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Waktu Konversi</th>
                        <th scope="col">WastePoin</th>
                        <th scope="col">Bank</th>
                        <th scope="col">Hasil Konversi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conversions as $conversion)    
                        <tr>
                            <td>{{ $conversion->created_at }}</td>
                            <td>{{ $conversion->total_points }}</td>
                            <td>{{ $conversion->bank }}</td>
                            <td>Rp{{ $conversion->conversion_result }}</td>
                            <td>
                                <a href="riwayat-konversi-poin/detail/{{ $conversion->id }}" class="btn-link">Lihat detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination mt-3 text-center justify-content-end">
            {{ $conversions->links() }}
        </div>
    @endif
@endsection