@extends('layouts.admin')

@section('title', 'Tambah Jenis Kendaraan')

@section('content')
<div class="max-w-xl bg-white p-6 rounded-xl shadow">

    <h2 class="text-lg font-semibold mb-4">➕ Tambah Jenis Kendaraan</h2>

    <form method="POST" action="{{ route('admin.jenis-kendaraan.store') }}">
        @csrf

        <label class="text-sm">Nama Jenis</label>
        <input type="text" name="nama"
               class="w-full border rounded px-3 py-2 mt-1">

        <div class="mt-4 flex justify-end">
            <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Simpan
            </button>
        </div>
    </form>

</div>
@endsection
