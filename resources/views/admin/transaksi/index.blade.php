@extends('layouts.admin')

@section('content')
<h1>Data Transaksi</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th_toggle>Kendaraan</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Total</th>
    </tr>

    @forelse ($transaksis as $transaksi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaksi->kendaraan->nama ?? '-' }}</td>
            <td>{{ $transaksi->tanggal_pinjam }}</td>
            <td>{{ $transaksi->tanggal_kembali }}</td>
            <td>{{ $transaksi->total }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" align="center">Belum ada transaksi</td>
        </tr>
    @endforelse
</table>
@endsection
