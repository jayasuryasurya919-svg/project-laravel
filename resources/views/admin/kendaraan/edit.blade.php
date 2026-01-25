@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Kendaraan</h2>

    <form action="{{ route('admin.kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan"
                   value="{{ $kendaraan->nama_kendaraan }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenis Kendaraan</label>
            <select name="jenis_kendaraan_id" class="form-control">
                @foreach ($jenisKendaraans as $jenis)
                    <option value="{{ $jenis->id }}"
                        {{ $kendaraan->jenis_kendaraan_id == $jenis->id ? 'selected' : '' }}>
                        {{ $jenis->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Plat Nomor</label>
            <input type="text" name="plat_nomor"
                   value="{{ $kendaraan->plat_nomor }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga Sewa</label>
            <input type="number" name="harga_sewa"
                   value="{{ $kendaraan->harga_sewa }}"
                   class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
