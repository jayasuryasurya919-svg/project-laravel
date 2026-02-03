@extends('layouts.admin')
@section('title','Tambah Kendaraan')

@section('content')
<form method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
<div class="col-md-6 mb-3">
    <label>Nama Kendaraan</label>
    <input type="text" name="nama" class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label>Nomor Polisi</label>
    <input type="text" name="nomor_polisi" class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label>Tahun</label>
    <input type="number" name="tahun" class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label>Jenis Kendaraan</label>
    <select name="jenis_kendaraan_id" class="form-select">
        @foreach($jenisKendaraans as $j)
        <option value="{{ $j->id }}">{{ $j->nama }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6 mb-3">
    <label>Gambar</label>
    <input type="file" name="gambar" class="form-control" onchange="previewImage(this)">
    <img id="preview-img" class="img-thumbnail mt-2" width="200">
</div>
</div>

<button class="btn btn-success">Simpan</button>
</form>
@endsection
