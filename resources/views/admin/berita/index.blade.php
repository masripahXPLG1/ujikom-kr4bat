@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 style="font-family: 'DM Serif Display', serif;">Kelola Berita & Info</h2>
        <p class="text-muted mb-0" style="font-size: .85rem;">Tulis dan kelola berita untuk ditampilkan di landing page.</p>
    </div>
    <a href="{{ route('berita.create') }}" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Berita
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
                <tr style="font-size: .72rem;" class="text-muted">
    <th class="p-3">No</th>
    <th class="p-3">FOTO</th>
    <th class="p-3">JUDUL</th>
    <th class="p-3">RINGKASAN</th>
    <th class="p-3">TANGGAL</th>
    <th class="p-3 text-end">AKSI</th>
</tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                    <tr>
    <td class="p-3">{{ $loop->iteration }}</td>
    <td class="p-3">
        @if($berita->foto)
            <img src="{{ asset('storage/'.$berita->foto) }}" alt="{{ $berita->judul }}"
                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;">
        @else
            <div class="d-flex align-items-center justify-content-center bg-light text-muted rounded-3"
                 style="width: 60px; height: 60px;">
                <i class="bi bi-image"></i>
            </div>
        @endif
    </td>
    <td class="p-3 fw-bold" style="font-size: .85rem;">{{ $berita->judul }}</td>
    <td class="p-3" style="font-size: .82rem; max-width: 320px;">
        {{ \Illuminate\Support\Str::limit($berita->ringkasan, 70) }}
    </td>
    <td class="p-3" style="font-size: .8rem;">{{ $berita->created_at->translatedFormat('d M Y') }}</td>
    <td class="p-3 text-end">
        <a href="{{ route('berita.show', $berita) }}" target="_blank" class="btn btn-sm btn-light border rounded-circle" title="Lihat di Halaman Publik">
            <i class="bi bi-eye"></i>
        </a>
        <a href="{{ route('berita.edit', $berita) }}" class="btn btn-sm btn-light border rounded-circle" title="Edit">
            <i class="bi bi-pencil"></i>
        </a>
        <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Hapus berita ini?')">
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
                            <i class="bi bi-newspaper display-5 d-block mb-2"></i>
                            Belum ada berita. Klik "Tambah Berita" untuk memulai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection