=<!DOCTYPE html>
<html>
<head>
    <title>Admin Beranda</title>
</head>
<body>

<h1>ADMIN PANEL</h1>

<nav>
    <a href="{{ route('admin.beranda') }}">Beranda</a> |
    <a href="{{ route('admin.kendaraan.index') }}">Kendaraan</a> |
    <a href="{{ route('admin.transaksi.index') }}">Transaksi</a>
</nav>

<hr>

<h3>Total Kendaraan: {{ $totalKendaraan }}</h3>

<h4>5 Kendaraan Terbaru</h4>

<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Nomor Polisi</th>
        <th>Tahun</th>
        <th>Harga</th>
    </tr>

    @foreach ($kendaraans as $kendaraan)
    <tr>
        <td>{{ $kendaraan->nama }}</td>
        <td>{{ $kendaraan->nomor_polisi }}</td>
        <td>{{ $kendaraan->tahun }}</td>
        <td>{{ $kendaraan->harga }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
