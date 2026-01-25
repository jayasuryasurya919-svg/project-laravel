<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
</head>
<body>

<aside>
    <h3>Admin Panel</h3>
    <ul>
        <li><a href="{{ route('admin.beranda') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.kendaraan.index') }}">Kendaraan</a></li>
        <li><a href="{{ route('admin.transaksi.index') }}">Transaksi</a></li>
    </ul>
</aside>

<section>
    @yield('content')
</section>

</body>
</html>
