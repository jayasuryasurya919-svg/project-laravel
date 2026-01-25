@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Data Kendaraan</h2>

    <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary mb-3">
        Tambah Kendaraan
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Plat</th>
                <th>Harga Sewa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraans as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->nama_kendaraan }}</td>
                <td>{{ $k->jenisKendaraan->nama }}</td>
                <td>{{ $k->plat_nomor }}</td>
                <td>{{ $k->harga_sewa }}</td>
                <td>
                    <a href="{{ route('admin.kendaraan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.kendaraan.destroy', $k->id) }}"
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
