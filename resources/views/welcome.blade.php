<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kr4bat - SMKN 4 Bogor</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts (Playfair Display ditambahkan untuk logo) -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                
                <!-- Kolom Kiri: Tulisan -->
                <div class="col-lg-6 mb- mb-lg-0">
                    <span class="badge bg-light text-primary border px-3 py-2 rounded-pill fw-bold mb-3">
                        <i class="bi bi-fire me-1"></i> Official SMKN 4 Bogor Website
                    </span>
                    <h1 class="display-4 fw-bold mb-3 text-dark">
                        Selamat datang di website <span style="color: #102A43;">SMK N 4 BOGOR</span>
                    </h1>
                    <p class="text-muted mb-4 lead fs-6">
                        Platform dokumentasi modern untuk merekam setiap karya, kegiatan, 
                        dan memori berharga seluruh warga sekolah dengan gaya interaktif.
                    </p>
                    <a href="#galeri" class="btn btn-primary-custom shadow">Jelajahi Galeri</a>
                </div>

                <!-- Kolom Kanan: 2 Kartu Foto -->
                <div class="col-lg-6">
                    <div class="hero-cards d-flex justify-content-center align-items-center gap-4">
                        <div class="photo-card card-1">
                            <img src="{{ asset('images/foto1.jpg') }}" alt="Kegiatan SMKN 4 Bogor" class="photo-img">
                        </div>

                        <div class="photo-card card-2">
                            <img src="{{ asset('images/foto2.jpg') }}" alt="Prestasi SMKN 4 Bogor" class="photo-img">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ===== Profil Sekolah ===== -->
<section id="profil" class="py-5 bg-white">
    <div class="container">

        <!-- Tentang: foto kecil + statistik -->
        <div class="row align-items-center g-4 mb-5">
            <div class="col-lg-5">
                <img src="{{ asset('images/foto1.jpg') }}" alt="SMKN 4 Bogor" class="about-img">
            </div>
            <div class="col-lg-7">
                <h2 class="fw-bold mb-3">Profil <span style="color: var(--blue);">SMKN 4 Bogor</span></h2>
                <p class="text-muted mb-4">
                    Sekolah kejuruan di Kota Bogor berstatus <strong>Sekolah Pusat Keunggulan</strong>.
                    Mencetak lulusan berkarakter, kompeten, dan siap kerja sesuai kebutuhan industri.
                </p>

                <!-- Statistik kartu modern -->
                <div class="row g-3">
                    <div class="col-4">
                        <div class="stat-card">
                            <i class="bi bi-people-fill"></i>
                            <h4>1.200+</h4>
                            <small>Siswa</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-card">
                            <i class="bi bi-person-video3"></i>
                            <h4>80+</h4>
                            <small>Guru</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-card">
                            <i class="bi bi-trophy-fill"></i>
                            <h4>150+</h4>
                            <small>Prestasi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Baris 2: Visi & Misi -->
<div class="row g-4 align-items-stretch">
    <div class="col-lg-6 d-flex">
        <div class="vm-card" onclick="this.classList.toggle('aktif')">
            <div class="vm-icon"><i class="bi bi-eye-fill"></i></div>
            <h5>Visi</h5>
            <p>"Terwujudnya generasi yang berkarakter, berprestasi, dan berdaya saing global melalui pendidikan vokasi yang unggul."</p>
        </div>
    </div>
    <div class="col-lg-6 d-flex">
        <div class="vm-card" onclick="this.classList.toggle('aktif')">
            <div class="vm-icon"><i class="bi bi-bullseye"></i></div>
            <h5>Misi</h5>
            <ul class="misi-list">
                <li><i class="bi bi-check2"></i> Pembelajaran aktif berbasis teknologi dan dunia kerja.</li>
                <li><i class="bi bi-check2"></i> Penguatan karakter siswa yang beriman dan disiplin.</li>
                <li><i class="bi bi-check2"></i> Kemitraan dengan industri dan dunia usaha.</li>
            </ul>
        </div>
    </div>
</div>

    </div>
</section>

<!-- ===== Program Keahlian ===== -->
<section id="program" class="py-5">
    <div class="container">
        <div class="program-head">
            <small>Program keahlian disekolah kami:</small>
            <h2>Program Keahlian</h2>
        </div>

        <div class="program-scroll" id="programScroll">

            <a href="{{ url('program/pplg') }}" class="program-card">
                <img src="{{ asset('images/logo-pplg.png') }}" alt="Logo PPLG" class="program-logo">
                <h5>PPLG</h5>
                <p>Pengembangan Perangkat Lunak dan Gim</p>
            </a>

            <a href="{{ url('program/tjkt') }}" class="program-card">
                <img src="{{ asset('images/logo-tjkt.png') }}" alt="Logo TJKT" class="program-logo">
                <h5>TJKT</h5>
                <p>Teknik Jaringan Komputer dan Telekomunikasi</p>
            </a>

            <a href="{{ url('program/tpfl') }}" class="program-card">
                <img src="{{ asset('images/logo-tpfl.png') }}" alt="Logo TPFL" class="program-logo">
                <h5>TPFL</h5>
                <p>Teknik Pengelasan dan Fabrikasi Logam</p>
            </a>

            <a href="{{ url('program/to') }}" class="program-card">
                <img src="{{ asset('images/logo-to.png') }}" alt="Logo TO" class="program-logo">
                <h5>TO</h5>
                <p>Teknik Otomotif</p>
            </a>

        </div>

        <div class="program-foot">
            <a href="#program" class="btn-more">View more</a>
            <div class="nav-panah">
                <button onclick="geserProgram(-1)"><i class="bi bi-arrow-left"></i></button>
                <button onclick="geserProgram(1)"><i class="bi bi-arrow-right"></i></button>
            </div>
        </div>

    </div>
</section>

<!-- ===== Berita & Informasi ===== -->
<section id="berita" class="py-5">
    <div class="container">

        <!-- Header -->
        <div class="berita-head">
            <h2>Berita & Informasi</h2>
            <a href="{{ route('berita.semua') }}">Lihat semua <i class="bi bi-arrow-up-right"></i></a>
        </div>

        <div class="berita-list">
            @forelse($beritas ?? [] as $berita)
                <a href="{{ route('berita.show', $berita) }}" class="berita-row">
                    <h5>{{ $berita->judul }}</h5>
                    <p>{{ $berita->ringkasan }}</p>
                    <i class="bi bi-arrow-up-right panah"></i>
                </a>
            @empty
                {{-- Fallback contoh statis (hapus saat CRUD sudah jalan) --}}
                <a href="#" class="berita-row">
                    <h5>Sejarah singkat</h5>
                    <p>Berdiri sebagai institusi keunggulan vokasi, SMKN 4 Bogor tumbuh menjadi ekosistem belajar inovatif yang mencetak lulusan berkarakter, kompeten, dan berdaya saing global di era digital.</p>
                    <i class="bi bi-arrow-up-right panah"></i>
                </a>
                <a href="#" class="berita-row">
                    <h5>Ekstrakulikuler</h5>
                    <p>Teater, nunas, untut bola basket, Ean seni, dasign,untut tega teknologi —wadah kreat untuk mahrah sertif dil oan tanggungjawabnya.</p>
                    <i class="bi bi-arrow-up-right panah"></i>
                </a>
                <a href="#" class="berita-row">
                    <h5>Berita & informasi</h5>
                    <p>Dapatkan informasi remil tentang prestasi siswa, kerja sama industri terbaru, serta pengumuman penting sekolah.</p>
                    <i class="bi bi-arrow-up-right panah"></i>
                </a>

                <a href="#" class="berita-row">
                    <h5>Fasilitas sekolah</h5>
                    <p>dilengkapi laboratorium komputer spesifikasi tinggi, bengkel praktik standar industri, gunkit permahan kosya, serta perpustakaan digital untuk mendukung kegiatan belajar dan mengasah potensi siswa di era teknologi.</p>
                    <i class="bi bi-arrow-up-right panah"></i>
                </a>
                
            @endforelse
        </div>

    </div>
</section>

   <!-- ===== Galeri ===== -->
<section id="galeri" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Galeri <span style="color: var(--blue);">Kegiatan</span></h2>
            <p class="text-muted">Dokumentasi terbaru dari Instagram resmi SMKN 4 Bogor</p>
        </div>

        <div class="galeri-grid">
            @forelse($galeris as $galeri)
                <div class="ig-card">
                    <!-- Header -->
                    <div class="ig-head">
                        <img src="{{ asset('images/logo-smkn4.png') }}" alt="Avatar">
                        <div>
                            <div class="nama">SMKN 4 Bogor</div>
                            <div class="lokasi">
                                <i class="bi bi-geo-alt-fill"></i> {{ $galeri->lokasi ?? 'Bogor, Indonesia' }}
                            </div>
                        </div>
                        <a href="{{ $galeri->link_ig }}" target="_blank" class="ms-auto text-muted">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>

                    <!-- Media IG -->
                    <div class="ig-media">
                        @if($galeri->kode_ig)
                            <iframe src="https://www.instagram.com/p/{{ $galeri->kode_ig }}/embed"
                                    frameborder="0" scrolling="no" allowfullscreen></iframe>
                        @else
                            <div class="ig-placeholder">
                                <i class="bi bi-instagram"></i>
                                <a href="{{ $galeri->link_ig }}" target="_blank">Lihat di Instagram</a>
                            </div>
                        @endif
                    </div>

                   <!-- Label kategori -->
<div class="ig-body">
    <span class="badge rounded-pill mb-2 d-inline-block"
          style="background: var(--blue-soft); color: var(--navy); font-size: .68rem; padding: 5px 12px;">
        <i class="bi bi-folder2-open me-1"></i>{{ $galeri->kategori ?? 'Umum' }}
    </span>
                        <div>{{ $galeri->deskripsi }}</div>
                    </div>

                    <!-- Aksi -->
                    <div class="ig-aksi">
                        <a href="{{ $galeri->link_ig }}" target="_blank" style="color: inherit;"><i class="bi bi-heart"></i></a>
                        <a href="{{ $galeri->link_ig }}" target="_blank" style="color: inherit;"><i class="bi bi-chat"></i></a>
                        <a href="{{ $galeri->link_ig }}" target="_blank" style="color: inherit;"><i class="bi bi-send"></i></a>
                        <a href="{{ $galeri->link_ig }}" target="_blank" class="bookmark" style="color: inherit;"><i class="bi bi-bookmark"></i></a>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 w-100">
                    <i class="bi bi-images display-4 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold">Belum ada galeri</h5>
                    <p class="text-muted small">Admin belum mengunggah dokumentasi.</p>
                </div>
            @endforelse
        </div>

        <div class="galeri-more">
            <a href="{{ route('galeri.semua') }}" class="btn-more">
                Lihat Lebih Banyak <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

    </div>
</section>

    <!-- ===== Footer ===== -->
<footer id="kontak" class="footer-section py-5 bg-dark text-white">
    <div class="container">
        <div class="row g-5">

            <!-- Kolom 1: Logo + Sosmed -->
            <div class="col-lg-4">
                <div class="footer-brand">
                    <img src="{{ asset('images/logo-smkn4.png') }}" alt="Logo SMKN 4 Bogor">
                    <div>
                        <h5>SMKN 4 BOGOR</h5>
                        <small>Smk Bisa, Smk Hebat</small>
                    </div>
                </div>
                <p style="color: #C9D8E8; font-size: .85rem; line-height: 1.7;">
                    Website resmi galeri dokumentasi kegiatan dan karya siswa
                    SMK Negeri 4 Bogor.
                </p>

                <div class="footer-judul mt-4">Follow our social media</div>
                <div class="sosmed">
                    <a href="https://api.whatsapp.com/send/?phone=628212262442" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.tiktok.com/@smkn4kotabogor?is_from_webapp=1&sender_device=pc" target="_blank" title="TikTok"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.instagram.com/smkn4bogor/" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://youtu.be/N6cmqCbQllo?si=wX4whuHjCRyKZF5v" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Alamat -->
            <div class="col-lg-4">
                <div class="footer-judul">Alamat Sekolah</div>
                <div class="footer-info">
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        {{ $kontak->alamat ?? 'Jalan Raya Tajur Kp. Buntar RT02/RW08 Kel. Muarasari Kec. Bogor Selatan Kota Bogor - Jawa Barat 16137' }}
                    </p>
                    <p>
                        <i class="bi bi-envelope-fill"></i>
                        {{ $kontak->email ?? 'smkn4@smkn4bogor.sch.id' }}
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i>
                        {{ $kontak->telepon ?? '+62 821-226-2442' }}
                    </p>
                    <p>
                        <i class="bi bi-clock-fill"></i>
                        {{ $kontak->jam_operasional ?? 'Senin – Jumat, 06.30 – 17.00 WIB' }}
                    </p>
                </div>
            </div>

            <!-- Kolom 3: Kirim Pesan -->
            <div class="col-lg-4">
                <div class="footer-judul">Kirim Pesan</div>
                <form action="{{ url('/kontak-kirim') }}" method="POST" class="footer-form">
                    @csrf
                    <div class="mb-2">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="pesan" rows="3" class="form-control" placeholder="Pesan" required></textarea>
                    </div>
                    <button type="submit" class="btn">
                        Kirim Pesan <i class="bi bi-send ms-1"></i>
                    </button>
                </form>
            </div>

        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} SMKN 4 Bogor. All rights reserved.
        </div>
    </div>
</footer>

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS: Geser kartu program -->
<script>
    function geserProgram(arah) {
        document.getElementById('programScroll')
            .scrollBy({ left: arah * 280, behavior: 'smooth' });
    }
</script>
</body>
</html>