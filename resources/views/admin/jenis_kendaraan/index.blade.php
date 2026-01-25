<h2>Jenis Kendaraan</h2>

<a href="{{ route('admin.jenis-kendaraan.create') }}">Tambah Jenis</a>

<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    @foreach ($jenisKendaraans as $jenis)
    <tr>
        <td>{{ $jenis->nama }}</td>
        <td>
            <form action="{{ route('admin.jenis-kendaraan.destroy', $jenis->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
