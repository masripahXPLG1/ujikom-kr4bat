<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Galeri - SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
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

        .filter-chip {
            padding: 8px 18px;
            border-radius: 50px;
            font-size: .82rem;
            font-weight: 700;
            text-decoration: none;
            color: var(--navy);
            background: #fff;
            border: 1px solid var(--border);
            transition: all .3s ease;
        }
        .filter-chip:hover { border-color: var(--blue); transform: translateY(-2px); }
        .filter-chip.aktif { background: var(--navy); color: #fff; border-color: var(--navy); }
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
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="fw-bold">Semua <span style="color: var(--blue);">Galeri Kegiatan</span></h2>
            <p class="text-muted">Seluruh dokumentasi dari Instagram SMKN 4 Bogor</p>
        </div>

        <!-- Filter kategori -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <a href="{{ route('galeri.semua') }}"
               class="filter-chip {{ !request('kategori') ? 'aktif' : '' }}">Semua</a>
            @foreach(['Kegiatan Pembelajaran (KBM)', 'Praktik Kerja Industri (Prakerin)', 'Ekstrakurikuler', 'Prestasi & Lomba', 'Event Sekolah'] as $kat)
                <a href="{{ route('galeri.semua', ['kategori' => $kat]) }}"
                   class="filter-chip {{ request('kategori') == $kat ? 'aktif' : '' }}">{{ $kat }}</a>
            @endforeach
        </div>

        <!-- Grid galeri -->
        <div class="galeri-grid">
            @forelse($galeris as $galeri)
                <div class="ig-card">
                    <div class="ig-head">
                        <img src="{{ asset('images/logo-smkn4.png') }}" alt="Avatar">
                        <div>
                            <div class="nama">SMKN 4 Bogor</div>
                            <div class="lokasi"><i class="bi bi-geo-alt-fill"></i> {{ $galeri->lokasi ?? 'Bogor' }}</div>
                        </div>
                    </div>
                    <div class="ig-media">
                        @if($galeri->kode_ig)
                            <iframe src="https://www.instagram.com/p/{{ $galeri->kode_ig }}/embed"
                                    frameborder="0" scrolling="no" allowfullscreen></iframe>
                        @endif
                    </div>
                    <div class="ig-body">
                        <span class="badge rounded-pill mb-2 d-inline-block"
                              style="background: var(--blue-soft); color: var(--navy); font-size: .68rem;">
                            <i class="bi bi-folder2-open me-1"></i>{{ $galeri->kategori }}
                        </span>
                        <div>{{ $galeri->deskripsi }}</div>
                    </div>
                    <div class="ig-aksi">
                        <a href="{{ $galeri->link_ig }}" target="_blank" style="color: inherit;"><i class="bi bi-heart"></i></a>
                        <a href="{{ $galeri->link_ig }}" target="_blank" style="color: inherit;"><i class="bi bi-chat"></i></a>
                        <a href="{{ $galeri->link_ig }}" target="_blank" class="bookmark" style="color: inherit;"><i class="bi bi-bookmark"></i></a>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 w-100">
                    <i class="bi bi-images display-4 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold">Tidak ada galeri di kategori ini</h5>
                </div>
            @endforelse
        </div>

        <div class="mt-4">{{ $galeris->appends(request()->query())->links() }}</div>

    </div>
</section>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>