<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
    <style>
        .admin-shell { min-height: 100vh; }
        .admin-sidebar { width: 260px; }
        .admin-topbar { position: sticky; top: 0; z-index: 20; }
        @media (max-width: 992px) {
            .admin-shell { flex-direction: column; }
            .admin-sidebar { width: 100% !important; height: auto !important; }
            .admin-sidebar .nav { flex-direction: row; flex-wrap: wrap; gap: 8px; }
            .admin-sidebar .nav .nav-link { padding: 6px 10px; }
        }
    </style>
</head>
<body>
<div class="d-flex admin-shell">

    {{-- SIDEBAR --}}
    <aside class="bg-dark text-white vh-100 admin-sidebar">
        <div class="p-4 border-bottom fw-bold">
            <i class="bi bi-speedometer2 me-2"></i>ADMIN PANEL
        </div>

        <ul class="nav flex-column p-3 gap-1">
            <li class="nav-item">
                <a href="{{ route('admin.beranda') }}" class="nav-link text-white">
                    <i class="bi bi-house me-2"></i>Beranda
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.kendaraan.index') }}" class="nav-link text-white">
                    <i class="bi bi-car-front me-2"></i>Kendaraan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.jenis-kendaraan.index') }}" class="nav-link text-white">
                    <i class="bi bi-tags me-2"></i>Jenis Kendaraan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.transaksi.index') }}" class="nav-link text-white">
                    <i class="bi bi-cash-coin me-2"></i>Transaksi
                </a>
            </li>
        </ul>
    </aside>

    {{-- CONTENT --}}
    <div class="flex-grow-1">

        {{-- TOPBAR --}}
        <nav class="navbar navbar-light bg-white shadow-sm px-4 admin-topbar">
            <span class="navbar-brand fw-semibold">
                @yield('title', 'Dashboard')
            </span>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('user.beranda') }}" class="btn btn-sm btn-outline-secondary">
                    Beranda User
                </a>
                <span class="text-muted small">{{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        {{-- PAGE --}}
        <main class="p-4">
            @yield('content')
        </main>

    </div>
</div>

@include('partials.script')
</body>
</html>
