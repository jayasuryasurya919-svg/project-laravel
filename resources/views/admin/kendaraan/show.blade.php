@extends('layouts.admin')
@section('title','Detail Kendaraan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Detail Kendaraan</h5>
        <small class="text-muted">Informasi kendaraan terpilih</small>
    </div>
    <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-outline-secondary">
        Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="row g-0">
        <div class="col-md-5">
            @if ($kendaraan->gambar)
                <img src="{{ asset($kendaraan->gambar) }}" class="img-fluid rounded-start" alt="Gambar kendaraan" onerror="this.onerror=null;this.src='{{ asset('no-image.svg') }}';">
            @else
                <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                    <span class="text-muted">Tidak ada gambar</span>
                </div>
            @endif
        </div>

        <div class="col-md-7">
            <div class="card-body">
                <h4 class="mb-3">{{ $kendaraan->nama }}</h4>

                <div class="mb-2"><strong>No Polisi:</strong> {{ $kendaraan->nomor_polisi }}</div>
                <div class="mb-2"><strong>Jenis:</strong> {{ optional($kendaraan->jenisKendaraan)->nama ?? '-' }}</div>
                <div class="mb-2"><strong>Tahun:</strong> {{ $kendaraan->tahun }}</div>

                <div class="mt-3 fs-4 fw-semibold text-success">
                    Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
