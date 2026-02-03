@extends('layouts.admin')

@section('title', 'Jenis Kendaraan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h5 class="mb-0">Jenis Kendaraan</h5>
        <small class="text-muted">Kelola kategori kendaraan</small>
    </div>
    <a href="{{ route('admin.jenis-kendaraan.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i>Tambah Jenis
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jenisKendaraans as $j)
                <tr>
                    <td>{{ $j->nama }}</td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('admin.jenis-kendaraan.edit',$j->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.jenis-kendaraan.destroy',$j->id) }}">
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
@endsection
