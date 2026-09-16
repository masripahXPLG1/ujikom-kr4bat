<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #071A2D 0%, #102A43 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .user-card {
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(0,0,0,.3);
            text-align: center;
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #D7E7F7;
            color: #102A43;
            font-size: 2rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .user-card h4 { font-weight: 800; color: #102A43; }
        .user-card .email { color: #60758A; font-size: .85rem; margin-bottom: 24px; }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #F3F7FC;
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 10px;
            text-decoration: none;
            color: #102A43;
            font-weight: 600;
            font-size: .9rem;
            transition: all .3s ease;
        }

        .menu-item:hover { background: #D7E7F7; transform: translateX(4px); }
        .menu-item i { color: #3B82C4; }

        .btn-logout {
            background: #ff6584;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 700;
            width: 100%;
            margin-top: 8px;
        }

        .btn-logout:hover { background: #e5547a; color: #fff; }

        /* ===== Popup Welcome ===== */
        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(7,26,45,.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: opacity .3s ease;
        }

        .popup-overlay.show {
            opacity: 1;
            pointer-events: all;
        }

        .popup-box {
            background: #fff;
            border-radius: 24px;
            padding: 36px 32px;
            max-width: 360px;
            width: 90%;
            text-align: center;
            transform: scale(.85);
            transition: transform .3s ease;
        }

        .popup-overlay.show .popup-box { transform: scale(1); }

        .popup-box .emoji {
            width: 70px;
            height: 70px;
            background: #D7E7F7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 16px;
        }

        .popup-box h5 { font-weight: 800; color: #102A43; }
        .popup-box p { color: #60758A; font-size: .85rem; }

        .popup-btn-logout {
            background: #ff6584;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 10px;
            font-weight: 700;
            width: 100%;
            margin-top: 8px;
        }

        .popup-btn-logout:hover { background: #e5547a; color: #fff; }

        .popup-btn-close {
            background: #F3F7FC;
            color: #102A43;
            border: none;
            border-radius: 50px;
            padding: 10px;
            font-weight: 700;
            width: 100%;
            margin-top: 8px;
        }
    </style>
</head>
<body>

<div class="user-card">
    <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
    <h4>{{ auth()->user()->name }}</h4>
    <p class="email">
        <i class="bi bi-envelope me-1"></i>{{ auth()->user()->email }}
    </p>

    <a href="{{ url('/') }}" class="menu-item">
        <i class="bi bi-house-door"></i> Kunjungi Website
    </a>

    <a href="{{ url('/') }}#galeri" class="menu-item">
        <i class="bi bi-images"></i> Lihat Galeri Kegiatan
    </a>

    <!-- Tombol buka popup -->
    <button class="btn btn-logout" onclick="bukaPopup()">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
    </button>
</div>

<!-- ===== POPUP WELCOME ===== -->
<div class="popup-overlay" id="popupWelcome">
    <div class="popup-box">
        <div class="emoji">👋</div>
        <h5>Selamat Datang, {{ auth()->user()->name }}!</h5>
        <p>Kamu berhasil login. Nikmati fitur website galeri SMKN 4 Bogor.</p>
        <button class="popup-btn-close" onclick="tutupPopup()">Lanjut Menjelajah</button>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="popup-btn-logout">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>
</div>

<script>
    // Popup muncul otomatis saat halaman dibuka (setelah login)
    window.addEventListener('load', function() {
        @if(session('welcome_popup'))
            document.getElementById('popupWelcome').classList.add('show');
        @endif
    });

    function bukaPopup() {
        document.getElementById('popupWelcome').classList.add('show');
    }

    function tutupPopup() {
        document.getElementById('popupWelcome').classList.remove('show');
    }
</script>

</body>
</html>