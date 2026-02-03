@extends('layouts.user')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Sewa Kendaraan</h5>
        <small class="text-muted">Lengkapi data sewa</small>
    </div>
    <a href="{{ route('user.beranda') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
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

        <form method="POST" action="{{ route('user.sewa.store', $kendaraan->id) }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Kendaraan</label>
                    <input class="form-control" value="{{ $kendaraan->nama }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nomor Polisi</label>
                    <input class="form-control" value="{{ $kendaraan->nomor_polisi }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Sewa</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lama Sewa (hari)</label>
                    <input type="number" name="lama_hari" class="form-control" min="1" value="{{ old('lama_hari') }}" required>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    <i class="bi bi-check2-circle me-1"></i>Konfirmasi Sewa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
