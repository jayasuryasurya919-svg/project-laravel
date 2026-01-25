@extends('layouts.admin')

@section('content')
<h3>Data Kendaraan</h3>

<a href="{{ route('admin.kendaraan.create') }}">+ Tambah</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach($kendaraans as $k)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->nama }}</td>
        <td>{{ $k->jenis }}</td>
        <td>{{ $k->harga }}</td>
        <td>
            <form action="{{ route('admin.kendaraan.destroy', $k->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
