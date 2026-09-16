<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMKN 4 Bogor</title>
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

        .auth-card {
            background: #fff;
            border-radius: 24px;
            padding: 44px 38px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(0,0,0,.3);
        }

        .auth-logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #D7E7F7;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
        }

        .auth-logo img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .auth-card h4 {
            font-weight: 800;
            color: #102A43;
            text-align: center;
            margin-bottom: 4px;
        }

        .auth-card .sub {
            text-align: center;
            color: #60758A;
            font-size: .85rem;
            margin-bottom: 26px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #D9E4F0;
            font-size: .9rem;
        }

        .form-control:focus {
            border-color: #3B82C4;
            box-shadow: 0 0 0 3px rgba(59,130,196,.15);
        }

        .btn-auth {
            background: #102A43;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 700;
            width: 100%;
            transition: all .3s ease;
        }

        .btn-auth:hover {
            background: #3B82C4;
            color: #fff;
        }

        .auth-card .footer-text {
            text-align: center;
            font-size: .82rem;
            color: #60758A;
            margin-top: 20px;
            margin-bottom: 0;
        }

        .auth-card .footer-text a {
            color: #3B82C4;
            font-weight: 700;
            text-decoration: none;
        }

        .btn-back {
            position: absolute;
            top: 24px;
            left: 24px;
            color: rgba(255,255,255,.7);
            font-size: .85rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-back:hover { color: #fff; }
    </style>
</head>
<body>

<a href="{{ url('/') }}" class="btn-back">
    <i class="bi bi-arrow-left"></i> Kembali ke Website
</a>

<div class="auth-card">
    <div class="auth-logo">
        <img src="{{ asset('images/logo-smkn4.png') }}" alt="Logo">
    </div>
    <h4>Selamat Datang Kembali</h4>
    <p class="sub">Login untuk mengirim pesan & mengakses akun kamu</p>

    @if(session('error'))
        <div class="alert alert-warning py-2" style="font-size: .82rem;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: .82rem;">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                   placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size: .82rem;">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                   placeholder="••••••••" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn-auth">Login</button>
    </form>

    <p class="footer-text">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </p>
</div>

</body>
</html>