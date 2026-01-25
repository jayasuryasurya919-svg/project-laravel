<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h2>Website Kendaraan</h2>
    <nav>
        <a href="/">Beranda</a>
        <a href="/admin">Admin</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© {{ date('Y') }} User</p>
</footer>

</body>
</html>
