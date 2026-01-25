<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
    <h2>ADMIN PANEL</h2>
    <a href="{{ route('admin.beranda') }}">Beranda</a> |
    <a href="{{ route('admin.kendaraan.index') }}">Kendaraan</a> |
    <a href="{{ route('admin.transaksi.index') }}">Transaksi</a>
    <hr>
    @yield('content')
</body>
</html>
