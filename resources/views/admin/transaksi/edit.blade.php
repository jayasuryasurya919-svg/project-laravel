@extends('layouts.admin')

@section('title', 'Edit Transaksi')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Edit Transaksi</h5>
        <small class="text-muted">Perbarui data transaksi</small>
    </div>
    <a href="{{ route('admin.transaksi.index') }}" class="btn btn-outline-secondary">
        Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Kendaraan</label>
                    <select name="kendaraan_id" class="form-select" required>
                        @foreach ($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->id }}" @selected(old('kendaraan_id', $transaksi->kendaraan_id) == $kendaraan->id)>
                                {{ $kendaraan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control" value="{{ old('nama_peminjam', $transaksi->nama_peminjam) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Sewa</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $transaksi->tanggal) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lama Sewa (hari)</label>
                    <input type="number" name="lama_hari" class="form-control" min="1" value="{{ old('lama_hari', $transaksi->lama_hari) }}" required>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
