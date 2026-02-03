@extends('layouts.admin')
@section('title','Edit Kendaraan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Edit Kendaraan</h5>
        <small class="text-muted">Perbarui data kendaraan</small>
    </div>
    <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-outline-secondary">
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

        <form action="{{ route('admin.kendaraan.update', $kendaraan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Kendaraan</label>
                    <input type="text" name="nama" value="{{ old('nama', $kendaraan->nama) }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nomor Polisi</label>
                    <input type="text" name="nomor_polisi" value="{{ old('nomor_polisi', $kendaraan->nomor_polisi) }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga', $kendaraan->harga) }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" value="{{ old('tahun', $kendaraan->tahun) }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan_id" class="form-select">
                        @foreach ($jenisKendaraans as $jenis)
                            <option value="{{ $jenis->id }}" @selected(old('jenis_kendaraan_id', $kendaraan->jenis_kendaraan_id) == $jenis->id)>
                                {{ $jenis->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" onchange="previewImage(this)">
                    @if ($kendaraan->gambar)
                        <img id="preview-img" src="{{ asset($kendaraan->gambar) }}" class="img-thumbnail mt-2" width="200" alt="Preview">
                    @else
                        <img id="preview-img" class="img-thumbnail mt-2 d-none" width="200" alt="Preview">
                    @endif
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
