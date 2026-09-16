@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 style="font-family: 'DM Serif Display', serif;">Detail Berita</h2>
    <p class="text-muted mb-0" style="font-size: .85rem;">Informasi lengkap berita.</p>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; max-width: 640px;">
    <div class="card-body p-4">
        <div class="mb-3">
            <label class="form-label fw-bold" style="font-size: .8rem;">Judul</label>
            <p class="fw-bold" style="font-size: 1.1rem;">{{ $berita->judul }}</p>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold" style="font-size: .8rem;">Ringkasan</label>
            <p>{{ $berita->ringkasan }}</p>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold" style="font-size: .8rem;">Tanggal Dibuat</label>
            <p class="text-muted">{{ $berita->created_at->translatedFormat('d F Y, H:i') }}</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('berita.edit', $berita) }}" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <a href="{{ route('berita.index') }}" class="btn btn-light border rounded-pill px-4 fw-bold">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection