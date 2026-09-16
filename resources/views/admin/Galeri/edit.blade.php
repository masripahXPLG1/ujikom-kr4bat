@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 style="font-family: 'DM Serif Display', serif;">Edit Galeri</h2>
    <p class="text-muted mb-0" style="font-size: .85rem;">Perbarui data galeri.</p>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; max-width: 640px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold" style="font-size: .8rem;">Link Post Instagram <span class="text-danger">*</span></label>
                <input type="url" name="link_ig" class="form-control" value="{{ old('link_ig', $galeri->link_ig) }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="font-size: .8rem;">Kategori Kegiatan <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <option value="Kegiatan Pembelajaran (KBM)" {{ old('kategori', $galeri->kategori) == 'Kegiatan Pembelajaran (KBM)' ? 'selected' : '' }}>Kegiatan Pembelajaran (KBM)</option>
                        <option value="Praktik Kerja Industri (Prakerin)" {{ old('kategori', $galeri->kategori) == 'Praktik Kerja Industri (Prakerin)' ? 'selected' : '' }}>Praktik Kerja Industri (Prakerin)</option>
                        <option value="Ekstrakurikuler" {{ old('kategori', $galeri->kategori) == 'Ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
                        <option value="Prestasi & Lomba" {{ old('kategori', $galeri->kategori) == 'Prestasi & Lomba' ? 'selected' : '' }}>Prestasi & Lomba</option>
                        <option value="Event Sekolah" {{ old('kategori', $galeri->kategori) == 'Event Sekolah' ? 'selected' : '' }}>Event Sekolah</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="font-size: .8rem;">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $galeri->lokasi) }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="font-size: .8rem;">Deskripsi <span class="text-danger">*</span></label>
                <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
                    <i class="bi bi-check-lg me-1"></i> Perbarui
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border rounded-pill px-4 fw-bold">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection