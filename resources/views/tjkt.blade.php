<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program TJKT - SMKN 4 Bogor</title>

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
            <img src="{{ asset('images/logo-tjkt.png') }}" alt="Logo TJKT">
            <h1>TJKT</h1>
            <p class="mb-0" style="color: rgba(255,255,255,.8);">Teknik Jaringan dan Komputer</p>
    </div>
</section>

<!-- Konten -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Kiri: Deskripsi + Kompetensi -->
            <div class="col-lg-7">
                <span class="section-tag">Tentang Jurusan</span>
                <h2 class="fw-bold mb-3">Teknik Jaringan dan Komputer</h2>
                <p class="text-muted mb-4">
                    Jurusan yang mempelajari instalasi, konfigurasi, dan perawatan jaringan komputer. Siswa dibimbing
                    menjadi ahli teknisi jaringan yang mampu mengelola dan memelihara infrastruktur TI.
                </p>

                <h5 class="fw-bold mb-2" style="color: var(--navy);">Kompetensi yang Dipelajari</h5>
                <ul class="kompetensi-list">
                    <li><i class="bi bi-check2-circle"></i> Instalasi dan Konfigurasi Jaringan</li>
                    <li><i class="bi bi-check2-circle"></i> Perawatan dan Troubleshooting Jaringan</li>
                    <li><i class="bi bi-check2-circle"></i> Keamanan Jaringan</li>
                    <li><i class="bi bi-check2-circle"></i> Administrasi Sistem Operasi</li>
                    <li><i class="bi bi-check2-circle"></i> Pemrograman Dasar</li>
                </ul>
            </div>

            <!-- Kanan: Peluang Karir -->
<div class="col-lg-5">
    <div class="misi-card">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-briefcase me-2" style="color: var(--blue);"></i>Peluang Karir
        </h5>
        <p class="text-muted small mb-3">Lulusan TJKT siap bekerja di bidang:</p>
        <ul class="kompetensi-list">
            <li><i class="bi bi-arrow-right-circle"></i> Network Engineer</li>
            <li><i class="bi bi-arrow-right-circle"></i> System Administrator</li>
            <li><i class="bi bi-arrow-right-circle"></i> IT Support</li>
            <li><i class="bi bi-arrow-right-circle"></i> Cyber Security Analyst</li>
            <li><i class="bi bi-arrow-right-circle"></i> Teknisi Fiber Optik</li>
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