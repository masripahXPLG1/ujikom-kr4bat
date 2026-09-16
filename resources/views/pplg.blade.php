<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program PPLG - SMKN 4 Bogor</title>

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
        <img src="{{ asset('images/logo-pplg.png') }}" alt="Logo PPLG">
        <h1>PPLG</h1>
        <p class="mb-0" style="color: rgba(255,255,255,.8);">Pengembangan Perangkat Lunak dan Gim</p>
    </div>
</section>

<!-- Konten -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Kiri: Deskripsi + Kompetensi -->
            <div class="col-lg-7">
                <span class="section-tag">Tentang Jurusan</span>
                <h2 class="fw-bold mb-3">Pengembangan Perangkat Lunak <span style="color: var(--blue);">dan Gim</span></h2>
                <p class="text-muted mb-4">
                    Jurusan yang mempelajari pemrograman web, mobile, dan gim. Siswa dibimbing
                    menjadi developer yang mampu membangun aplikasi modern sesuai standar industri.
                </p>

                <h5 class="fw-bold mb-2" style="color: var(--navy);">Kompetensi yang Dipelajari</h5>
                <ul class="kompetensi-list">
                    <li><i class="bi bi-check2-circle"></i> Pemrograman Web (HTML, CSS, JavaScript, PHP)</li>
                    <li><i class="bi bi-check2-circle"></i> Framework Laravel & Bootstrap</li>
                    <li><i class="bi bi-check2-circle"></i> Pengembangan Aplikasi Mobile</li>
                    <li><i class="bi bi-check2-circle"></i> Desain UI/UX & Basis Data</li>
                    <li><i class="bi bi-check2-circle"></i> Pengembangan Game 2D</li>
                </ul>
            </div>

            <!-- Kanan: Peluang Karir -->
<div class="col-lg-5">
    <div class="misi-card">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-briefcase me-2" style="color: var(--blue);"></i>Peluang Karir
        </h5>
        <p class="text-muted small mb-3">Lulusan PPLG siap bekerja di bidang:</p>
        <ul class="kompetensi-list">
            <li><i class="bi bi-arrow-right-circle"></i> Web Developer</li>
            <li><i class="bi bi-arrow-right-circle"></i> Mobile Developer</li>
            <li><i class="bi bi-arrow-right-circle"></i> Game Developer</li>
            <li><i class="bi bi-arrow-right-circle"></i> UI/UX Designer</li>
            <li><i class="bi bi-arrow-right-circle"></i> Database Administrator</li>
        </ul>
    </div>
</div>

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