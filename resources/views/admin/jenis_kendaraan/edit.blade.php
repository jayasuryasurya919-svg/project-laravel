@extends('layouts.admin')

@section('title', 'Edit Jenis Kendaraan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Edit Jenis Kendaraan</h5>
        <small class="text-muted">Perbarui kategori kendaraan</small>
    </div>
    <a href="{{ route('admin.jenis-kendaraan.index') }}" class="btn btn-outline-secondary">
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

        <form method="POST" action="{{ route('admin.jenis-kendaraan.update',$jenis_kendaraan->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Jenis</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $jenis_kendaraan->nama) }}">
            </div>
            <button class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Update
            </button>
        </form>
    </div>
</div>
@endsection
