@extends('layouts.admin')
@section('title','Tambah Kendaraan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Tambah Kendaraan</h5>
        <small class="text-muted">Lengkapi data kendaraan di bawah</small>
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

        <form method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Kendaraan</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nomor Polisi</label>
                    <input type="text" name="nomor_polisi" class="form-control" value="{{ old('nomor_polisi') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan_id" class="form-select">
                        @foreach($jenisKendaraans as $j)
                        <option value="{{ $j->id }}" @selected(old('jenis_kendaraan_id') == $j->id)>{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" onchange="previewImage(this)">
                    <img id="preview-img" class="img-thumbnail mt-2 d-none" width="200" alt="Preview">
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
