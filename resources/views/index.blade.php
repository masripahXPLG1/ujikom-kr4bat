@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1" style="font-family: 'DM Serif Display', serif;">Kelola Galeri Foto</h4>
        <p class="text-muted small mb-0">Kelola postingan Instagram yang akan tampil di depan.</p>
    </div>
    <a href="{{ route('fotos.create') }}" class="btn text-white px-4 rounded-pill fw-bold" style="background-color: #635bff;">
        + Unggah Postingan
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 rounded-3 mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="row g-3">
    @forelse($fotos as $foto)
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <img src="{{ asset('storage/' . $foto->lokasi_file) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                <div class="card-body p-3">
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill mb-2 fw-semibold" style="font-size: 0.7rem;">
                        {{ $foto->album->nama_album ?? 'Tanpa Album' }}
                    </span>
                    <h6 class="fw-bold text-dark mb-1 text-truncate">{{ $foto->judul_foto }}</h6>
                    <small class="text-muted d-block text-truncate mb-2"><i class="bi bi-geo-alt me-1"></i>{{ $foto->lokasi ?: 'SMKN 4 Bogor' }}</small>

                    @if($foto->link_ig)
                        <a href="{{ $foto->link_ig }}" target="_blank" class="d-block small text-primary text-truncate mb-3 text-decoration-none">
                            <i class="bi bi-instagram me-1"></i> {{ $foto->link_ig }}
                        </a>
                    @endif

                    <div class="d-flex gap-2">
                        <a href="{{ route('fotos.edit', $foto->id) }}" class="btn btn-sm btn-light border w-50 rounded-pill fw-semibold">
                            Edit
                        </a>
                        <form action="{{ route('fotos.destroy', $foto->id) }}" method="POST" class="w-50" onsubmit="return confirm('Yakin hapus postingan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light text-danger border w-100 rounded-pill fw-semibold">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">
            Belum ada postingan foto galeri.
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $fotos->links() }}
</div>
@endsection