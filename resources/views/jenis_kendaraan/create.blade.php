@extends('layouts.app')

@section('content')
<h4>Tambah Jenis Kendaraan</h4>
<form method="POST" action="{{ route('jenis-kendaraan.store') }}">
@csrf
<input type="text" name="nama" class="form-control mb-2" placeholder="Nama Jenis">
<button class="btn btn-success">Simpan</button>
</form>
@endsection
