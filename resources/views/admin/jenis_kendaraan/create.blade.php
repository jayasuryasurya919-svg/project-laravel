@extends('layouts.app')

@section('content')
<h2>Tambah Jenis Kendaraan</h2>

<form action="{{ route('admin.jenis-kendaraan.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Contoh: Motor">
    <button type="submit">Simpan</button>
</form>
@endsection
