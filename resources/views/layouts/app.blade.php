<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kendaraan Aset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        {{-- BRAND KE BERANDA ADMIN --}}
        <a class="navbar-brand" href="{{ route('admin.beranda') }}">
            Kendaraan Aset
        </a>

        <div>
            {{-- KE DATA KENDARAAN --}}
            <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-outline-light btn-sm">
                Admin
            </a>
        </div>
    </div>
</nav>

<div class="container">
    {{-- ISI HALAMAN --}}
    @yield('content')
</div>

</body>
</html>
