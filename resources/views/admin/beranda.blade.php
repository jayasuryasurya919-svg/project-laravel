@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kendaraan</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($kendaraans as $kendaraan)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    {{-- GAMBAR --}}
                    @if($kendaraan->gambar)
                        <img src="{{ asset('storage/'.$kendaraan->gambar) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=No+Image"
                             class="card-img-top">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title text-capitalize">
                            {{ $kendaraan->merk }}
                        </h5>

                        <p class="mb-1"><strong>No Polisi:</strong> {{ $kendaraan->nomor_polisi }}</p>
                        <p class="mb-1"><strong>Jenis:</strong> {{ $kendaraan->jenis->nama ?? '-' }}</p>
                        <p class="mb-1"><strong>Tahun:</strong> {{ $kendaraan->tahun }}</p>
                        <p class="mb-2">
                            <strong>Harga / hari:</strong>
                            Rp {{ number_format($kendaraan->harga,0,',','.') }}
                        </p>

                        {{-- STATUS --}}
                        @if($kendaraan->transaksiAktif)
                            <span class="badge bg-danger mb-2">Sedang Disewa</span>
                        @else
                            <span class="badge bg-success mb-2">Tersedia</span>
                        @endif
                    </div>

                    {{-- TOMBOL --}}
                    <div class="card-footer bg-white border-0">
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-secondary btn-sm">
                                Deskripsi
                            </a>

                            @if(!$kendaraan->transaksiAktif)
                                <a href="{{ route('transaksi.create', $kendaraan->id) }}"
                                   class="btn btn-success btn-sm">
                                    Sewa
                                </a>
                            @else
                                <button class="btn btn-danger btn-sm" disabled>
                                    Tidak Tersedia
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
