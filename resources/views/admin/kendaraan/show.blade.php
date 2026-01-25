@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="row g-0">

        <div class="col-md-5">
            @if ($kendaraan->gambar)
                <img src="{{ asset('storage/' . $kendaraan->gambar) }}"
                     class="img-fluid rounded-start">
            @endif
        </div>

        <div class="col-md-7">
            <div class="card-body">
                <h4>{{ $kendaraan->merk }}</h4>

                <p><strong>No Polisi:</strong> {{ $kendaraan->nomor_polisi }}</p>
                <p><strong>Jenis:</strong> {{ $kendaraan->jenis->nama }}</p>
                <p><strong>Tahun:</strong> {{ $kendaraan->tahun }}</p>

                <h5 class="text-success">
                    Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}
                </h5>

                <a href="{{ route('beranda') }}" class="btn btn-secondary mt-3">
                    Kembali
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
