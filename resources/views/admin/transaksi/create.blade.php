<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>

<h2>Tambah Transaksi</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <label>Kendaraan</label><br>
    <select name="kendaraan_id" required>
        @foreach($kendaraans as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select><br><br>

    <label>Nama Peminjam</label><br>
    <input type="text" name="nama_peminjam" required><br><br>

    <label>Tanggal</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Lama Hari</label><br>
    <input type="number" name="lama_hari" required><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
