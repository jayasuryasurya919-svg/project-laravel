@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-4">Tambah Kendaraan</h4>

            <form action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nomor Polisi --}}
                <div class="mb-3">
                    <label class="form-label">Nomor Polisi</label>
                    <input type="text" name="nomor_polisi" class="form-control" required>
                </div>

                {{-- Merk --}}
                <div class="mb-3">
                    <label class="form-label">Merk Kendaraan</label>
                    <input type="text" name="merk" class="form-control" required>
                </div>

                {{-- Tahun --}}
                <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" required>
                </div>

                {{-- Jenis --}}
                <div class="mb-3">
                    <label class="form-label">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan_id" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        @foreach ($jenisKendaraans as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                {{-- Gambar --}}
                <div class="mb-3">
                    <label class="form-label">Gambar Kendaraan</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
