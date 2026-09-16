 <!-- Navbar -->

 @php
    // Logo pintar: arah klik tergantung siapa yang login
    if (!auth()->check()) {
        $logoUrl = route('login');        // guest → pintu login (rahasia admin)
    } elseif (auth()->user()->role === 'admin') {
        $logoUrl = route('home');         // admin → dashboard admin
    } else {
        $logoUrl = url('/');              // user biasa → halaman utama saja
    }
@endphp

    <nav class="navbar navbar-expand-lg sticky-top py-2 shadow-sm">
        <div class="container">
            <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/logo-smkn4.png') }}" alt="Logo SMKN 4 Bogor" 
                     width="40" height="40" class="me-2">
                
                <div class="d-flex flex-column">
                    <span class="fw-bold" 
                          style="font-family: 'Playfair Display', Georgia, serif; 
                                 color: #fbfcfd; 
                                 font-size: 1.05rem; 
                                 letter-spacing: 0.5px;">
                        SMKN 4 BOGOR
                    </span>
                    <small style="color: #ebebeb; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.5px;">
                        Smk Bisa, Smk Hebat
                    </small>
                </div>
            </a>

            <!-- ✅ Tombol hamburger dikembalikan -->
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3" href="#">Beranda</a>
                </li>
                
                <!-- Dropdown Profil yang Diperbaiki -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold text-dark px-3" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm rounded-3 py-2" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item py-2 px-3 text-secondary fw-medium" href="#profil">Profil Sekolah</a></li>
                        <li><a class="dropdown-item py-2 px-3 text-secondary fw-medium" href="#program">Program Keahlian</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3" href="#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3" href="#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3" href="#kontak">Kontak</a>
                </li>
                    
                    <li class="nav-item">
                        <a href="https://www.instagram.com/smkn4bogor/" target="_blank" rel="noopener noreferrer"
                           class="btn btn-primary-custom px-4 shadow-sm">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://youtu.be/N6cmqCbQllo?si=wX4whuHjCRyKZF5v" target="_blank" rel="noopener noreferrer"
                           class="btn btn-primary-custom px-4 shadow-sm">
                            <i class="bi bi-youtube me-1"></i> Tonton
                        </a>
                    </li>

                    <!-- ✅ HANYA MUNCUL KALAU SUDAH LOGIN -->
@auth
    <li class="nav-item">
        <div class="dropdown">
            <button class="btn btn-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                    type="button" data-bs-toggle="dropdown" 
                    style="width: 36px; height: 36px;" 
                    title="{{ auth()->user()->name }}">
                <i class="bi bi-person-fill-gear"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                
                {{-- Info user yang login --}}
                <li>
                    <span class="dropdown-item-text small text-muted" style="font-size: .75rem;">
                        <i class="bi bi-person-check-fill me-1" style="color: #3B82C4;"></i>
                        {{ auth()->user()->name }}
                    </span>
                </li>
                <li><hr class="dropdown-divider"></li>

                {{-- ✅ HANYA ADMIN yang melihat menu Dashboard --}}
                @if(auth()->user()->role === 'admin')
                    <li>
                        <a class="dropdown-item small fw-semibold" href="{{ route('home') }}">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                        </a>
                    </li>
                @endif

                {{-- Logout --}}
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item small text-danger fw-semibold">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </li>
@endauth

@guest
    {{-- guest: tidak tampil apapun (persis gambar kamu) --}}
@endguest
                </ul>
            </div>
        </div>
    </nav>