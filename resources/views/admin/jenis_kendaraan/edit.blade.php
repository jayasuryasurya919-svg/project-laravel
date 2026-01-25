@extends('layouts.admin')

@section('content')
<h4>Edit Jenis Kendaraan</h4>
<form method="POST" action="{{ route('jenis-kendaraan.update',$jenis_kendaraan->id) }}">
@csrf @method('PUT')
<input type="text" name="nama" class="form-control mb-2" value="{{ $jenis_kendaraan->nama }}">
<button class="btn btn-primary">Update</button>
</form>
@endsection
