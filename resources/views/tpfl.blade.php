<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program TPFL - SMKN 4 Bogor</title>

    <!-- CSS sama dengan welcome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('partials.navbar')

<!-- Banner -->
<section class="program-banner">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ url('/') }}">Beranda</a>
            <i class="bi bi-chevron-right mx-1"></i> Program Keahlian
        </div>
        <img src="{{ asset('images/logo-tpfl.png') }}" alt="Logo TPFL">
        <h1>TPFL</h1>
        <p class="mb-0" style="color: rgba(255,255,255,.8);">Teknik Pengelasan dan Fabrikasi Logam</p>
    </div>
</section>

<!-- Konten -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Kiri: Deskripsi + Kompetensi -->
            <div class="col-lg-7">
                <span class="section-tag">Tentang Jurusan</span>
                <h2 class="fw-bold mb-3">Teknik Pengelasan <span style="color: var(--blue);">dan Fabrikasi Logam</span></h2>
                <p class="text-muted mb-4">
                    Jurusan yang mempelajari teknik pengelasan, perancangan, dan fabrikasi struktur logam
                    sesuai standar industri manufaktur dan konstruksi.
                </p>

                <h5 class="fw-bold mb-2" style="color: var(--navy);">Kompetensi yang Dipelajari</h5>
                <ul class="kompetensi-list">
                    <li><i class="bi bi-check2-circle"></i> Pengelasan SMAW, GTAW, GMAW</li>
                    <li><i class="bi bi-check2-circle"></i> Pembacaan Gambar Teknik</li>
                    <li><i class="bi bi-check2-circle"></i> Fabrikasi Struktur Logam</li>
                    <li><i class="bi bi-check2-circle"></i> Pemotongan & Pembentukan Logam</li>
                    <li><i class="bi bi-check2-circle"></i> Quality Control Pengelasan</li>
                </ul>
            </div>

            <!-- Kanan: Peluang Karir -->
            <div class="col-lg-5">
                <div class="misi-card">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-briefcase me-2" style="color: var(--blue);"></i>Peluang Karir
                    </h5>
                    <p class="text-muted small mb-3">Lulusan TPFL siap bekerja di bidang:</p>
                    <ul class="kompetensi-list">
                        <li><i class="bi bi-arrow-right-circle"></i> Welder Bersertifikat</li>
                        <li><i class="bi bi-arrow-right-circle"></i> Fabrikator Logam</li>
                        <li><i class="bi bi-arrow-right-circle"></i> Quality Control</li>
                        <li><i class="bi bi-arrow-right-circle"></i> Drafter Teknik</li>
                        <li><i class="bi bi-arrow-right-circle"></i> Wirausaha Bengkel Las</li>
                    </ul>
                </div>
            </div>

        </div>  <!-- ✅ tutup row -->

        <!-- Kembali -->
        <div class="text-center mt-5">
            <a href="{{ url('/') }}#program" class="btn-more">
                <i class="bi bi-arrow-left me-1"></i> Program Lainnya
            </a>
        </div>
    </div>
</section>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>