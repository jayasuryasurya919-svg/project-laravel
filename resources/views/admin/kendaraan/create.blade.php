<h2>Tambah Kendaraan</h2>

<form action="{{ route('admin.kendaraan.store') }}" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="Nama"><br><br>
    <input type="text" name="nomor_polisi" placeholder="Nomor Polisi"><br><br>

    <select name="jenis_kendaraan_id">
        @foreach ($jenisKendaraans as $jenis)
            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
        @endforeach
    </select><br><br>

    <input type="number" name="tahun" placeholder="Tahun"><br><br>
    <input type="number" name="harga" placeholder="Harga"><br><br>

    <button type="submit">Simpan</button>
</form>
