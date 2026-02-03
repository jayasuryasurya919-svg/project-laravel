@extends('layouts.user')

@section('content')
<h3>Sewa Kendaraan</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('user.sewa.store', $kendaraan->id) }}">
@csrf

<div class="mb-3">
    <label class="form-label">Nama Kendaraan</label>
    <input class="form-control" value="{{ $kendaraan->nama }}" disabled>
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Sewa</label>
    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Lama Sewa (hari)</label>
    <input type="number" name="lama_hari" class="form-control" min="1" value="{{ old('lama_hari') }}" required>
</div>

<button class="btn btn-success">
    Konfirmasi Sewa
</button>
</form>
@endsection
