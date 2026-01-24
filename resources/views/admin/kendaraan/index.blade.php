@extends('layouts.app')

@section('title', 'Kendaraan Aset')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Kendaraan Aset</h4>
        <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary">
            + Tambah
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Kendaraan</th>
                        <th>Plat Nomor</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kendaraan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kendaraan }}</td>
                            <td>{{ $item->plat_nomor }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>
                                <a href="{{ route('admin.kendaraan.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.kendaraan.destroy', $item->id) }}"
                                      method="POST"
                                      style="display:inline-block"
                                      onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Data kendaraan belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
