<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $title ?? 'Aplikasi Rental Kendaraan' }}</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Google -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Custom Global Style -->
<style>
    :root {
        --rk-bg: #f6f7fb;
        --rk-ink: #0f172a;
        --rk-muted: #64748b;
        --rk-card: #ffffff;
        --rk-border: #e5e7eb;
        --rk-accent: #2563eb;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--rk-bg);
        color: var(--rk-ink);
    }

    .card {
        border-radius: 12px;
        border-color: var(--rk-border);
        background: var(--rk-card);
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    }

    .btn {
        border-radius: 10px;
        font-weight: 500;
    }

    .navbar-brand {
        font-weight: 600;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border-color: var(--rk-border);
    }

    .table th {
        background-color: #eef2f7;
    }

    .text-muted {
        color: var(--rk-muted) !important;
    }
</style>

{{-- Tambahan CSS per halaman --}}
@stack('styles')
