@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Data Transaksi</h5>
        <small class="text-muted">Daftar transaksi terbaru</small>
    </div>
    <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Tambah Transaksi
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Kendaraan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->user->name ?? $t->nama_peminjam }}</td>
                    <td>{{ $t->kendaraan->nama ?? '-' }}</td>
                    <td>
                        {{ $t->tanggal ? \Illuminate\Support\Carbon::parse($t->tanggal)->format('d-m-Y') : $t->created_at->format('d-m-Y') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
