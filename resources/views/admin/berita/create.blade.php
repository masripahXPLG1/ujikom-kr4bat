@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 style="font-family: 'DM Serif Display', serif;">Tambah Berita</h2>
    <p class="text-muted mb-0" style="font-size: .85rem;">Tulis berita atau informasi baru.</p>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; max-width: 640px;">
    <div class="card-body p-4">
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold" style="font-size: .8rem;">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}" required>
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="font-size: .8rem;">Foto</label>
                <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror">
                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <small class="text-muted">Opsional. Format JPG/PNG, maks 2MB.</small>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="font-size: .8rem;">Deskripsi <span class="text-danger">*</span></label>
                <textarea name="ringkasan" rows="6" class="form-control @error('ringkasan') is-invalid @enderror"
                          placeholder="Tulis deskripsi lengkap berita..." required>{{ old('ringkasan') }}</textarea>
                @error('ringkasan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
                    <i class="bi bi-check-lg me-1"></i> Simpan
                </button>
                <a href="{{ route('berita.index') }}" class="btn btn-light border rounded-pill px-4 fw-bold">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection