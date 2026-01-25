@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Kendaraan</h2>

    <form action="{{ route('admin.kendaraan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenis Kendaraan</label>
            <select name="jenis_kendaraan_id" class="form-control">
                @foreach ($jenisKendaraans as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Plat Nomor</label>
            <input type="text" name="plat_nomor" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga Sewa</label>
            <input type="number" name="harga_sewa" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
