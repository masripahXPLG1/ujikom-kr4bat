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

    @auth
        {{-- ✅ User sudah login: boleh kirim --}}
        <p style="color: #C9D8E8; font-size: .8rem;">
            <i class="bi bi-person-check-fill me-1" style="color: #8EC5F0;"></i>
            Login sebagai <strong style="color: #fff;">{{ auth()->user()->name }}</strong>
        </p>

        @if(session('success'))
            <div class="alert alert-success py-2" style="font-size: .8rem;">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pesan.kirim') }}" method="POST" class="footer-form">
            @csrf
            <div class="mb-3">
                <textarea name="pesan" rows="4" class="form-control" 
                          placeholder="Tulis pesan kamu untuk sekolah..." required></textarea>
            </div>
            <button type="submit" class="btn">
                Kirim Pesan <i class="bi bi-send ms-1"></i>
            </button>
        </form>
    @endauth

    @guest
    <div style="background: rgba(255,255,255,.08); border-radius: 14px; padding: 26px 20px; text-align: center;">
        <i class="bi bi-lock-fill" style="font-size: 1.8rem; color: #8EC5F0;"></i>
        <p style="color: #C9D8E8; font-size: .85rem; margin: 12px 0 16px;">
            Login terlebih dahulu untuk mengirim pesan ke sekolah.
        </p>
        <a href="{{ route('login') }}" class="btn btn-light fw-bold rounded-pill px-4 w-100">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </a>
    </div>
@endguest
</div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} SMKN 4 Bogor. All rights reserved.
        </div>
    </div>
</footer>