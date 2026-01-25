@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Sewa Kendaraan</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Kendaraan:</strong> {{ $kendaraan->merk }}</p>

            <form action="{{ route('transaksi.store', $kendaraan->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Sewa</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Lama Sewa (hari)</label>
                    <input type="number" name="lama_hari" class="form-control" required>
                </div>

                <button class="btn btn-success">Sewa Sekarang</button>
            </form>
        </div>
    </div>
</div>
@endsection
