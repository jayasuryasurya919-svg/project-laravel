@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Sewa Kendaraan</h3>

    <div class="card">
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

            <form action="{{ route('admin.transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Kendaraan</label>
                    <select name="kendaraan_id" class="form-control" required>
                        <option value="">Pilih kendaraan</option>
                        @foreach ($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->id }}" @selected(old('kendaraan_id') == $kendaraan->id)>
                                {{ $kendaraan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control" value="{{ old('nama_peminjam') }}" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Sewa</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <div class="mb-3">
                    <label>Lama Sewa (hari)</label>
                    <input type="number" name="lama_hari" class="form-control" min="1" value="{{ old('lama_hari') }}" required>
                </div>

                <button class="btn btn-success">Sewa Sekarang</button>
            </form>
        </div>
    </div>
</div>
@endsection
