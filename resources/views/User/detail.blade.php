@extends('layouts.user')

@section('content')
<div class="row">
    <div class="col-md-6">
        @php
            $gambar = $kendaraan->gambar ? asset($kendaraan->gambar) : null;
        @endphp
        @if ($gambar)
            <img 
                src="{{ $gambar }}" 
                class="img-fluid rounded shadow"
            >
        @else
            <div class="border rounded shadow d-flex align-items-center justify-content-center" style="height: 240px;">
                <span class="text-muted">Gambar tidak tersedia</span>
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <h3>{{ $kendaraan->nama }}</h3>

        <p>Jenis: {{ optional($kendaraan->jenisKendaraan)->nama ?? '-' }}</p>
        <p>Tahun: {{ $kendaraan->tahun }}</p>
        <p>Nomor Polisi: {{ $kendaraan->nomor_polisi }}</p>

        <h4 class="text-success">
            Rp {{ number_format($kendaraan->harga) }} / hari
        </h4>

        <a 
            href="{{ route('user.sewa.create', $kendaraan->id) }}" 
            class="btn btn-success mt-3"
        >
            Sewa Sekarang
        </a>
    </div>
</div>
@endsection
