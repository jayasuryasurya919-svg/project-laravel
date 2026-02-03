@extends('layouts.user')

@section('content')
<div class="row g-4">

@foreach($kendaraans as $k)
<div class="col-md-4">
    <div class="card h-100 shadow-sm">

        {{-- GAMBAR --}}
        <img 
            src="{{ $k->gambar ? asset($k->gambar) : asset('no-image.png') }}" 
            class="card-img-top" 
            style="height:200px;object-fit:cover"
        >

        {{-- BODY --}}
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $k->nama }}</h5>

            <p class="mb-1 text-muted">
                Jenis: {{ $k->jenisKendaraan->nama }}
            </p>

            <p class="mb-2">
                Tahun: {{ $k->tahun }}
            </p>

            <h6 class="text-success mb-3">
                Rp {{ number_format($k->harga) }} / hari
            </h6>

            {{-- TOMBOL --}}
            <div class="mt-auto d-flex gap-2">
                <a 
                    href="{{ route('user.kendaraan.show', $k->id) }}" 
                    class="btn btn-outline-primary btn-sm w-50"
                >
                    Detail
                </a>

                <a 
                    href="{{ route('user.sewa.create', $k->id) }}" 
                    class="btn btn-success btn-sm w-50"
                >
                    Sewa
                </a>
            </div>
        </div>

    </div>
</div>
@endforeach

</div>
@endsection
