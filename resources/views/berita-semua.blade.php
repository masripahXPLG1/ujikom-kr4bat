<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita - SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .back-wrap {
    padding: 1.5rem 0 0 2rem;
}

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #475569;
            font-weight: 600;
            text-decoration: none;
            font-size: .88rem;
            transition: color .15s ease;
        }
        .back-link:hover { color: #2563eb; }

        .berita-item-row {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #eef1f6;
            text-decoration: none;
            color: inherit;
        }
        .berita-item-row:hover h5 { color: #2563eb; }
        .berita-item-row img {
            width: 160px;
            height: 110px;
            object-fit: cover;
            border-radius: 14px;
            flex-shrink: 0;
        }
        .berita-item-row .no-img {
            width: 160px;
            height: 110px;
            border-radius: 14px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 1.6rem;
            flex-shrink: 0;
        }
        .berita-item-row h5 { font-weight: 700; margin-bottom: .4rem; transition: color .2s; }
        .berita-item-row p { color: #697386; font-size: .88rem; margin-bottom: .4rem; }
        .berita-item-row small { color: #a3acb9; }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="back-wrap">
    <a href="{{ url('/') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Kembali ke Beranda
    </a>
</div>

<section class="py-5">
    <div class="container" style="max-width: 900px;">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Semua <span style="color: var(--blue);">Berita & Informasi</span></h2>
            <p class="text-muted">Kumpulan berita dan informasi terbaru dari SMKN 4 Bogor</p>
        </div>

        <div class="berita-item-list">
            @forelse($beritas as $berita)
                <a href="{{ route('berita.show', $berita) }}" class="berita-item-row">
                    @if($berita->foto)
                        <img src="{{ asset('storage/'.$berita->foto) }}" alt="{{ $berita->judul }}">
                    @else
                        <div class="no-img"><i class="bi bi-image"></i></div>
                    @endif
                    <div>
                        <h5>{{ $berita->judul }}</h5>
                        <p>{{ \Illuminate\Support\Str::limit($berita->ringkasan, 140) }}</p>
                        <small><i class="bi bi-calendar3 me-1"></i>{{ $berita->created_at->translatedFormat('d F Y') }}</small>
                    </div>
                </a>
            @empty
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-newspaper display-4 mb-3 d-block"></i>
                    Belum ada berita.
                </div>
            @endforelse
        </div>

        <div class="mt-4">{{ $beritas->links() }}</div>

    </div>
</section>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>