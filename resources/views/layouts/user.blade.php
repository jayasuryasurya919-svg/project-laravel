<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
    <style>
        .user-nav {
            background: linear-gradient(135deg, #0f172a, #1e293b);
        }
        .user-nav .btn {
            border-color: rgba(255,255,255,0.25);
        }
        .user-shell {
            padding-top: 16px;
            padding-bottom: 24px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark user-nav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.beranda') }}">Rental Kendaraan</a>
        <div class="d-flex gap-2">
            <a href="{{ route('user.beranda') }}" class="btn btn-outline-light btn-sm">Beranda</a>
            @auth
                <a href="{{ route('user.transaksi.index') }}" class="btn btn-outline-light btn-sm">Transaksi Saya</a>
                <a href="{{ route('admin.beranda') }}" class="btn btn-outline-light btn-sm">Admin Panel</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container user-shell">
    @yield('content')
</div>

@include('partials.script')
</body>
</html>
