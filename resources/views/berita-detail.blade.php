<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - SMKN 4 Bogor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
        }

        .berita-back-wrap {
            padding: 1.5rem 2rem 0;
            background: #fff;
        }

        .berita-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #475569;
            font-weight: 600;
            text-decoration: none;
            font-size: .88rem;
            transition: color .15s ease;
        }
        .berita-back:hover { color: #2563eb; }

        .berita-detail-hero {
            background: #fff;
            padding: 1.5rem 0 2.5rem;
            border-bottom: 1px solid #eef1f6;
        }

        .berita-detail-hero h1 {
            font-weight: 800;
            font-size: 2.4rem;
            color: #0f172a;
            line-height: 1.25;
            margin-bottom: 1rem;
            max-width: 780px;
        }

        .berita-detail-hero .meta {
            color: #64748b;
            font-size: .88rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .berita-detail-img {
            width: 100%;
            max-height: 460px;
            object-fit: cover;
            border-radius: 18px;
            margin: 2.5rem 0;
            display: block;
        }

        .berita-detail-noimg {
            width: 100%;
            height: 220px;
            border-radius: 18px;
            margin: 2.5rem 0;
            background: #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
        }
        .berita-detail-noimg i { font-size: 2.5rem; margin-bottom: .5rem; }

        .berita-detail-body {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #334155;
            white-space: pre-line;
        }

        .berita-detail-footer-nav {
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eef1f6;
        }

        @media (max-width: 768px) {
            .berita-detail-hero h1 { font-size: 1.7rem; }
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="berita-back-wrap">
    <a href="{{ url('/') }}#berita" class="berita-back">
        <i class="bi bi-arrow-left"></i> Kembali ke Berita
    </a>
</div>

<section class="berita-detail-hero">
    <div class="container" style="max-width: 780px;">

        <h1>{{ $berita->judul }}</h1>

        <div class="meta">
            <i class="bi bi-calendar3"></i>
            {{ $berita->created_at->translatedFormat('d F Y') }}
        </div>
    </div>
</section>

<div class="container py-4" style="max-width: 780px;">

    @if($berita->foto)
        <img src="{{ asset('storage/'.$berita->foto) }}" alt="{{ $berita->judul }}" class="berita-detail-img">
    @else
        <div class="berita-detail-noimg">
            <i class="bi bi-image"></i>
            <small>Tidak ada foto</small>
        </div>
    @endif

    <div class="berita-detail-body">{{ $berita->ringkasan }}</div>

    <div class="berita-detail-footer-nav">
        <a href="{{ route('berita.semua') }}" class="btn btn-light border rounded-pill px-4 fw-bold">
            <i class="bi bi-grid me-1"></i> Lihat Berita Lainnya
        </a>
    </div>
</div>

<div class="mt-5">
    @include('partials.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>