@extends('layouts.user')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Katalog Kendaraan</h5>
        <small class="text-muted">Pilih kendaraan terbaik untuk perjalananmu</small>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('user.beranda') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Nama Kendaraan</label>
                    <input type="text" name="nama" class="form-control" value="{{ $filters['nama'] ?? '' }}" placeholder="Cari nama">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nomor Polisi</label>
                    <input type="text" name="nomor_polisi" class="form-control" value="{{ $filters['nomor_polisi'] ?? '' }}" placeholder="Contoh: B 1234 CD">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan_id" class="form-select">
                        <option value="">Semua</option>
                        @foreach ($jenisKendaraans as $jenis)
                            <option value="{{ $jenis->id }}" @selected(($filters['jenis_kendaraan_id'] ?? '') == $jenis->id)>{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Urutkan</label>
                    <select name="sort" class="form-select">
                        <option value="terbaru" @selected(($filters['sort'] ?? 'terbaru') === 'terbaru')>Terbaru</option>
                        <option value="harga_asc" @selected(($filters['sort'] ?? '') === 'harga_asc')>Harga Termurah</option>
                        <option value="harga_desc" @selected(($filters['sort'] ?? '') === 'harga_desc')>Harga Termahal</option>
                    </select>
                </div>
                <div class="col-md-12 d-flex gap-2">
                    <button class="btn btn-primary">Filter</button>
                    <a href="{{ route('user.beranda') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

@if ($kendaraans->isEmpty())
    <div class="alert alert-info">
        Belum ada kendaraan tersedia.
    </div>
@else
<div class="row g-4">
    @foreach($kendaraans as $k)
    @php
        $latest = $k->latestTransaksi;
        $isRented = false;
        $rentedUntil = null;
        if ($latest && $latest->tanggal) {
            $end = \Illuminate\Support\Carbon::parse($latest->tanggal)
                ->addDays(max((int) $latest->lama_hari, 1) - 1)
                ->endOfDay();
            if (now()->lte($end)) {
                $isRented = true;
                $rentedUntil = $end;
            }
        }
    @endphp
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">

            <img 
                src="{{ $k->gambar ? asset($k->gambar) : asset('no-image.svg') }}" 
                class="card-img-top" 
                style="height:200px;object-fit:cover"
                alt="Gambar {{ $k->nama }}"
                onerror="this.onerror=null;this.src='{{ asset('no-image.svg') }}';"
            >

            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-1">{{ $k->nama }}</h5>

                <div class="text-muted small mb-1">
                    Jenis: {{ optional($k->jenisKendaraan)->nama ?? '-' }}
                </div>
                <div class="text-muted small mb-1">
                    No Polisi: {{ $k->nomor_polisi }}
                </div>
                <div class="text-muted small mb-2">
                    Tahun: {{ $k->tahun }}
                </div>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="fs-6 fw-semibold text-success">
                        Rp {{ number_format($k->harga) }} / hari
                    </div>
                    @if ($isRented)
                        <span class="badge text-bg-secondary">Tersewa</span>
                    @else
                        <span class="badge text-bg-success">Tersedia</span>
                    @endif
                </div>

                <div class="mt-auto d-flex gap-2">
                    <a 
                        href="{{ route('user.kendaraan.show', $k->id) }}" 
                        class="btn btn-outline-primary btn-sm w-50"
                    >
                        Detail
                    </a>

                    @if ($isRented)
                        <button class="btn btn-outline-secondary btn-sm w-50" disabled>
                            Tersewa sampai {{ $rentedUntil->format('d-m-Y') }}
                        </button>
                    @else
                        <a 
                            href="{{ route('user.sewa.create', $k->id) }}" 
                            class="btn btn-primary btn-sm w-50"
                        >
                            Sewa
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $kendaraans->appends(request()->query())->links() }}
</div>
@endif
@endsection
