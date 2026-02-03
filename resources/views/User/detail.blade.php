@extends('layouts.user')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Detail Kendaraan</h5>
        <small class="text-muted">Informasi lengkap kendaraan</small>
    </div>
    <a href="{{ route('user.beranda') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="row g-0">
        <div class="col-md-6">
            @php
                $gambar = $kendaraan->gambar ? asset($kendaraan->gambar) : null;
            @endphp
            @if ($gambar)
                <img 
                    src="{{ $gambar }}" 
                    class="img-fluid rounded-start"
                    alt="Gambar {{ $kendaraan->nama }}"
                    onerror="this.onerror=null;this.src='{{ asset('no-image.svg') }}';"
                >
            @else
                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 320px;">
                    <span class="text-muted">Gambar tidak tersedia</span>
                </div>
            @endif
        </div>

        <div class="col-md-6">
            <div class="card-body">
                <h4 class="mb-3">{{ $kendaraan->nama }}</h4>

                <div class="mb-2"><strong>Jenis:</strong> {{ optional($kendaraan->jenisKendaraan)->nama ?? '-' }}</div>
                <div class="mb-2"><strong>Tahun:</strong> {{ $kendaraan->tahun }}</div>
                <div class="mb-3"><strong>Nomor Polisi:</strong> {{ $kendaraan->nomor_polisi }}</div>

                <div class="fs-4 fw-semibold text-success">
                    Rp {{ number_format($kendaraan->harga) }} / hari
                </div>

                <a 
                    href="{{ route('user.sewa.create', $kendaraan->id) }}" 
                    class="btn btn-primary mt-3"
                >
                    Sewa Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
