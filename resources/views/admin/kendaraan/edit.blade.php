@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Kendaraan</h3>

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Nomor Polisi</label>
            <input type="text" name="nomor_polisi" value="{{ $kendaraan->nomor_polisi }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Merk</label>
            <input type="text" name="merk" value="{{ $kendaraan->merk }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Tahun</label>
            <input type="number" name="tahun" value="{{ $kendaraan->tahun }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="harga"
                value="{{ $kendaraan->harga }}"
                class="form-control"
                placeholder="Masukkan harga kendaraan">
        </div>

        <div class="mb-2">
            <label>Jenis Kendaraan</label>
            <select name="jenis_kendaraan_id" class="form-control">
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}"
                        {{ $kendaraan->jenis_kendaraan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @if($kendaraan->gambar)
                <img src="{{ asset('storage/'.$kendaraan->gambar) }}" width="100" class="mt-2">
            @endif
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
