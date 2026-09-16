<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Kr4bat</title>

    <!-- Font Asli Pitch.io: DM Serif Display (Judul Banner) & Plus Jakarta Sans (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        :root {
            --bg-canvas: #f8fafc;
            --sidebar-width: 240px;
            --purple-main: #635bff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: #2a2f45;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Stay / Fixed di Kiri */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: #ffffff;
            padding: 2rem 1.25rem;
            border-right: 1px solid #edf2f7;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            font-size: 1.25rem;
            color: #1a1f36;
            text-decoration: none;
            margin-bottom: 2rem;
            padding-left: 0.25rem;
            letter-spacing: -0.02em;
        }

        .sidebar-brand .brand-logo {
            width: 32px;
            height: 32px;
            background: var(--purple-main);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 700;
        }

        .btn-create-pitch {
            background: #f0f0ff;
            color: var(--purple-main);
            border: none;
            border-radius: 16px;
            padding: 0.85rem 1rem;
            font-weight: 700;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-create-pitch:hover {
            background: #e4e4ff;
            color: var(--purple-main);
        }

        .btn-create-pitch .plus-icon {
            width: 28px;
            height: 28px;
            background: var(--purple-main);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .sidebar-menu .nav-link {
            color: #697386;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 0.4rem;
            transition: all 0.2s;
        }

        .sidebar-menu .nav-link:hover, .sidebar-menu .nav-link.active {
            color: var(--purple-main);
            background: #ffffff;
            font-weight: 700;
        }

        /* Area Konten (Lebih Luas & Smooth Scroll) */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem 3rem;
            min-height: 100vh;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .top-header h5 {
            font-weight: 800;
            margin: 0;
            font-size: 1.25rem;
            color: #1a1f36;
            letter-spacing: -0.02em;
        }

        .top-header .date-text {
            color: #a3acb9;
            font-size: 0.82rem;
            font-weight: 600;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: #c7d2fe;
            color: #4338ca;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

    <!-- Sidebar Diam / Stay -->
    <aside class="sidebar">
        <a href="{{ route('home') }}" class="sidebar-brand">
            <div class="brand-logo">K</div>
            <span>Kr4bat</span>
        </a>

        <div class="nav flex-column sidebar-menu">
            <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
    <i class="bi bi-people-fill"></i> Kelola User
</a>
            <a href="{{ route('admin.galeri.index') }}" class="nav-link">
    <i class="bi bi-instagram"></i> Galeri Instagram
</a>
            <a href="{{ route('berita.index') }}" class="nav-link">
    <i class="bi bi-newspaper"></i> Berita & Info
</a>
            <a href="{{ route('admin.pesan') }}" class="nav-link {{ request()->routeIs('admin.pesan') ? 'active' : '' }}">
    <i class="bi bi-envelope-fill"></i> Pesan Masuk
</a>

            <a href="{{ url('/') }}" target="_blank" class="nav-link">
        <i class="bi bi-globe2"></i> Kunjungi Website
    </a>
        </div>
    </aside>

    <!-- Main Content -->
<main class="main-content">
    <header class="top-header">
        <div>
            <h5>Dashboard</h5>
            <span class="date-text">{{ date('l, d F Y') }}</span>
        </div>
        <div class="d-flex align-items-center gap-3">

            <!-- ✅ Ikon Pesan + Badge Notifikasi -->
            @php
                $pesanBaru = \App\Models\Pesan::where('dibaca', false)->count();
            @endphp
            <a href="{{ route('admin.pesan') }}" class="position-relative text-muted" 
               style="text-decoration: none;" title="Pesan Masuk">
                <i class="bi bi-envelope fs-5"></i>
                @if($pesanBaru > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                          style="font-size: .6rem;">{{ $pesanBaru }}</span>
                @endif
            </a>

            <i class="bi bi-bell text-muted fs-5 cursor-pointer me-2"></i>
            
            <div class="user-avatar">AK</div>
            <div class="dropdown">
                <button class="btn btn-link text-dark text-decoration-none dropdown-toggle fw-bold p-0 fs-7" type="button" data-bs-toggle="dropdown">
                    AdminK4
                </button>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-2 rounded-3">
    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger small fw-semibold">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </li>
</ul>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>