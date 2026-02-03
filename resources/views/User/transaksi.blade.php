@extends('layouts.user')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">Transaksi Saya</h3>
    <a href="{{ route('user.beranda') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
</div>

@if ($transaksis->isEmpty())
    <div class="alert alert-info">
        Belum ada transaksi.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kendaraan</th>
                    <th>Tanggal</th>
                    <th>Lama (hari)</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->kendaraan->nama ?? '-' }}</td>
                    <td>
                        {{ $t->tanggal ? \Illuminate\Support\Carbon::parse($t->tanggal)->format('d-m-Y') : $t->created_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $t->lama_hari }}</td>
                    <td>Rp {{ number_format($t->total_harga) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
