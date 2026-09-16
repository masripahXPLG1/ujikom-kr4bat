@extends('layouts.admin')

@section('content')
<style>
    .banner-welcome {
        background: #e9e8ff;
        border-radius: 24px;
        padding: 2.8rem 3rem;
        margin-bottom: 2rem;
    }

    .banner-welcome h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 2.3rem;
        color: #1a1f36;
        margin-bottom: 0.4rem;
        letter-spacing: 0.01em;
    }

    .banner-welcome p {
        color: #4f566b;
        font-size: 0.95rem;
        font-weight: 500;
        margin: 0;
    }

    .section-title {
        color: #a3acb9;
        font-size: 0.82rem;
        font-weight: 700;
        margin-bottom: 1rem;
        letter-spacing: 0.02em;
    }

    .stat-card-pitch {
        border-radius: 16px;
        padding: 1.25rem 1.5rem;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-card-pitch.yellow      { background: #f5b938; }
    .stat-card-pitch.dark-purple { background: #3c3b6e; }
    .stat-card-pitch.pink        { background: #ff6584; }
    .stat-card-pitch.light-purple{ background: #c5b8ff; }

    .stat-card-pitch .val {
        font-size: 1.6rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 0.2rem;
    }

    .stat-card-pitch .lbl {
        font-size: 0.76rem;
        font-weight: 600;
        opacity: 0.95;
    }

    .stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.22);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .pitch-item-card {
        background: #ffffff;
        border: 1px solid #f0f3f8;
        border-radius: 20px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.015);
    }

    .pitch-info h6 {
        font-weight: 700;
        color: #635bff;
        margin-bottom: 0.2rem;
        font-size: 0.95rem;
    }

    .pitch-info p {
        color: #697386;
        font-size: 0.82rem;
        margin-bottom: 0.3rem;
        max-width: 500px;
    }

    .pitch-info .sub {
        font-weight: 700;
        font-size: 0.75rem;
        color: #1a1f36;
    }
</style>

@php
    $totalUser   = \App\Models\User::count();
    $totalGaleri = \App\Models\Galeri::count();
    $totalBerita = \App\Models\Berita::count();
    $totalPesan  = \App\Models\Pesan::count();
    $pesanBaru   = \App\Models\Pesan::where('dibaca', false)->count();
@endphp

{{-- Banner Sapaan --}}
<div class="banner-welcome">
    <h2>Hi, {{ auth()->user()->name }}</h2>
    <p>Kelola seluruh sistem informasi, galeri, berita, dan pesan masuk Kr4bat SMKN 4 Bogor.</p>
</div>

{{-- Overview --}}
<div class="section-title">Overview</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card-pitch yellow">
            <div>
                <div class="val">{{ $totalUser }}</div>
                <div class="lbl">Kelola User</div>
            </div>
            <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card-pitch dark-purple">
            <div>
                <div class="val">{{ $totalGaleri }}</div>
                <div class="lbl">Galeri Foto</div>
            </div>
            <div class="stat-icon"><i class="bi bi-images"></i></div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card-pitch pink">
            <div>
                <div class="val">{{ $totalBerita }}</div>
                <div class="lbl">Berita & Info</div>
            </div>
            <div class="stat-icon"><i class="bi bi-newspaper"></i></div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card-pitch light-purple">
            <div>
                <div class="val">{{ $totalPesan }}</div>
                <div class="lbl">
                    Pesan Masuk
                    @if($pesanBaru > 0)
                        <span class="badge bg-danger rounded-pill ms-1" style="font-size: .6rem;">
                            {{ $pesanBaru }} baru
                        </span>
                    @endif
                </div>
            </div>
            <div class="stat-icon"><i class="bi bi-envelope-fill"></i></div>
        </div>
    </div>
</div>

{{-- Modul Utama --}}
<div class="section-title">Modul Utama</div>

<div class="pitch-item-card">
    <div class="d-flex align-items-center gap-3">
        <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center"
             style="width: 64px; height: 64px; font-size: 1.5rem;">
            <i class="bi bi-instagram"></i>
        </div>
        <div class="pitch-info">
            <h6>Kelola Galeri Instagram</h6>
            <p>Tambah, edit, dan hapus galeri kegiatan via link postingan Instagram.</p>
            <span class="sub">Total {{ $totalGaleri }} Galeri</span>
        </div>
    </div>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm text-white px-4 rounded-pill fw-bold"
       style="background-color: #635bff;">Buka Galeri</a>
</div>

<div class="pitch-item-card">
    <div class="d-flex align-items-center gap-3">
        <div class="bg-danger bg-opacity-10 text-danger rounded-3 d-flex align-items-center justify-content-center"
             style="width: 64px; height: 64px; font-size: 1.5rem;">
            <i class="bi bi-newspaper"></i>
        </div>
        <div class="pitch-info">
            <h6>Kelola Berita & Info</h6>
            <p>Tulis berita dan informasi terbaru untuk ditampilkan di landing page.</p>
            <span class="sub">Total {{ $totalBerita }} Berita</span>
        </div>
    </div>
    <a href="{{ route('berita.index') }}" class="btn btn-sm btn-light border px-4 rounded-pill fw-bold text-dark">Buka Berita</a>
</div>

@endsection