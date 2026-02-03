@extends('layouts.admin')
@section('title','Data Kendaraan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Data Kendaraan</h5>
        <small class="text-muted">Kelola data kendaraan yang tersedia</small>
    </div>
    <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Tambah Kendaraan
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>No Polisi</th>
                    <th>Jenis</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kendaraans as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($k->gambar)
                            <img src="{{ asset($k->gambar) }}" width="80" class="rounded border" onerror="this.onerror=null;this.src='{{ asset('no-image.svg') }}';">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->nomor_polisi }}</td>
                    <td>{{ optional($k->jenisKendaraan)->nama ?? '-' }}</td>
                    <td>{{ $k->tahun }}</td>
                    <td>Rp {{ number_format($k->harga) }}</td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('admin.kendaraan.show',$k->id) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.kendaraan.edit',$k->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.kendaraan.destroy',$k->id) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $kendaraans->links() }}
</div>
@endsection
