<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kr4bat</title>

    <!-- Vite Assets (Bootstrap & Icons) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light min-vh-100 d-flex flex-column justify-content-between">

    <!-- Header Navbar Admin/Login -->
    <nav class="navbar navbar-expand-md navbar-white bg-white border-bottom shadow-sm py-3">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand fw-bold text-dark fs-3 text-decoration-none" href="{{ url('/') }}">
                Kr4bat
            </a>

            <!-- Tombol Kanan Navbar -->
            <div class="d-flex align-items-center gap-2 ms-auto">
                <a href="https://www.youtube.com/@smknegeri4bogor415" target="_blank" class="btn btn-outline-danger btn-sm px-3 rounded-pill fw-semibold">
                    <i class="bi bi-youtube me-1"></i> Tonton
                </a>
                <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" class="btn btn-danger btn-sm px-3 rounded-pill fw-semibold">
                    <i class="bi bi-instagram me-1"></i> Instagram
                </a>

                @auth
                    <a href="{{ url('/home') }}" class="btn btn-dark btn-sm ms-2">Dashboard</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content Utama -->
    <main class="py-4 my-auto">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-3 bg-white border-top text-center text-muted small">
        <div class="container">
            &copy; {{ date('Y') }} SMKN 4 Kota Bogor. All rights reserved.
        </div>
    </footer>

    <!-- Tempat Script Tambahan -->
    @stack('scripts')
</body>
</html>