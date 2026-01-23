@extends('layouts.app')

@section('content')
<h4>📂 Jenis Kendaraan</h4>

<a href="{{ route('jenis-kendaraan.create') }}"
   class="btn btn-success mb-3">➕ Tambah</a>

<table class="table table-bordered">
<tr class="table-dark">
<th>No</th>
<th>Nama</th>
<th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $d->nama }}</td>
<td>
    <a href="{{ route('jenis-kendaraan.edit',$d->id) }}"
       class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('jenis-kendaraan.destroy',$d->id) }}"
          method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm"
        onclick="return confirm('Hapus?')">Hapus</button>
    </form>
</td>
</tr>
@endforeach
</table>
@endsection
