@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="font-family: 'DM Serif Display', serif;">Lihat Galeri</h2>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border rounded-pill px-4 fw-bold">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
            @if($galeri->kode_ig)
                <iframe src="https://www.instagram.com/p/{{ $galeri->kode_ig }}/embed"
                        frameborder="0" scrolling="no" style="width:100%; height:500px; border:0;"></iframe>
            @else
                <div class="text-center text-muted p-5">
                    <i class="bi bi-instagram display-4 d-block mb-2"></i>
                    <a href="{{ $galeri->link_ig }}" target="_blank">Buka post asli di Instagram</a>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background: #e9e8ff; color: #635bff;">
                    <i class="bi bi-folder2-open me-1"></i>{{ $galeri->kategori }}
                </span>
                <h5 class="fw-bold">Deskripsi</h5>
                <p class="text-muted">{{ $galeri->deskripsi }}</p>

                <h6 class="fw-bold mt-4">Informasi</h6>
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $galeri->lokasi ?? '-' }}</li>
                    <li class="mb-2"><i class="bi bi-calendar3 me-2"></i>{{ $galeri->created_at->translatedFormat('d F Y, H:i') }}</li>
                    <li><i class="bi bi-instagram me-2"></i>
                        <a href="{{ $galeri->link_ig }}" target="_blank">Buka post asli di Instagram</a>
                    </li>
                </ul>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" onsubmit="return confirm('Hapus galeri ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-light border rounded-pill px-4 fw-bold text-danger">
                            <i class="bi bi-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection