@extends('layouts.admin')
@section('title','Beranda')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-primary-subtle text-primary p-3">
                    <i class="bi bi-car-front fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Kendaraan</div>
                    <div class="fs-3 fw-semibold">{{ $totalKendaraan }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-success-subtle text-success p-3">
                    <i class="bi bi-tags fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Jenis Kendaraan</div>
                    <div class="fs-3 fw-semibold">{{ $totalJenis }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-warning-subtle text-warning p-3">
                    <i class="bi bi-cash-coin fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Transaksi</div>
                    <div class="fs-3 fw-semibold">{{ $totalTransaksi }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex align-items-center justify-content-between mb-3">
    <h5 class="mb-0">5 Kendaraan Terbaru</h5>
    <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-sm btn-outline-primary">
        Lihat Semua
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kendaraans as $k)
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ optional($k->jenisKendaraan)->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($k->harga) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
