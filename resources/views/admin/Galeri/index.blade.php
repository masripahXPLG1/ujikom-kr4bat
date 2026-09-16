@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 style="font-family: 'DM Serif Display', serif;">Kelola Galeri</h2>
        <p class="text-muted mb-0" style="font-size: .85rem;">Galeri kegiatan dari link postingan Instagram. 6 terbaru tampil di landing page.</p>
    </div>
    <a href="{{ route('admin.galeri.create') }}" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Galeri
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success py-2" style="font-size: .85rem;">
        <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
    </div>
@endif

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="font-size: .72rem; letter-spacing: .5px;" class="text-muted">
                    <th class="p-3">#</th>
                    <th class="p-3">KATEGORI</th>
                    <th class="p-3">DESKRIPSI</th>
                    <th class="p-3">POST IG</th>
                    <th class="p-3">TANGGAL</th>
                    <th class="p-3 text-end">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $galeri)
                    <tr>
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">
                            <span class="badge rounded-pill" style="background: #e9e8ff; color: #635bff;">
                                {{ $galeri->kategori ?? 'Tanpa Kategori' }}
                            </span>
                        </td>
                        <td class="p-3" style="font-size: .82rem; max-width: 280px;">
                            {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 60) }}
                        </td>
                        <td class="p-3">
                            <a href="{{ $galeri->link_ig }}" target="_blank" class="text-decoration-none" style="font-size: .8rem;">
                                <i class="bi bi-instagram me-1" style="color: #E1306C;"></i>Post
                            </a>
                        </td>
                        <td class="p-3" style="font-size: .8rem;">{{ $galeri->created_at->translatedFormat('d M Y') }}</td>
                        <td class="p-3 text-end">
                            <a href="{{ route('galeri.semua') }}" target="_blank" class="btn btn-sm btn-light border rounded-circle" title="Lihat di Halaman Publik">
    				<i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.galeri.edit', $galeri) }}"
                               class="btn btn-sm btn-light border rounded-circle" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST"
                                  class="d-inline" onsubmit="return confirm('Hapus galeri ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-light border rounded-circle text-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted p-5">
                            <i class="bi bi-images display-5 d-block mb-2"></i>
                            Belum ada galeri. Klik "Tambah Galeri" untuk memulai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection