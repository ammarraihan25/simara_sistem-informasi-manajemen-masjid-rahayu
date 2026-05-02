<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMARA - Sistem Informasi Manajemen Masjid Rahayu')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <nav>
        <div class="container nav-container">
            <a href="{{ route('home') }}" class="logo">
                <i data-lucide="mosque"></i>
                SIMARA<span>.</span>
            </a>
            
            <div class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('jadwal') }}" class="{{ request()->routeIs('jadwal') ? 'active' : '' }}">Jadwal</a>
                <a href="{{ route('keuangan') }}" class="{{ request()->routeIs('keuangan') ? 'active' : '' }}">Keuangan</a>
                <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel') ? 'active' : '' }}">Artikel</a>
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a>
                <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
                <a href="{{ route('admin.login') }}" class="login-btn">Login</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-info">
                    <h3 style="color: white">SIMARA<span>.</span></h3>
                    <p>Jl. Songgorunggi No. 17C, Bumi, Kec.Laweyan, Surakarta.</p>
                </div>
                <div class="footer-info">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('jadwal') }}">Jadwal</a></li>
                        <li><a href="{{ route('keuangan') }}">Keuangan</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} Masjid Rahayu.
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
