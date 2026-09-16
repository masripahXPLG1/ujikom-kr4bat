<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk - Admin SMKN 4 Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .pesan-card {
            background: #fff;
            border: 1px solid #f0f3f8;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,.015);
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .pesan-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #635bff;
            color: #fff;
            font-weight: 700;
            font-size: .8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .pesan-card h6 {
            font-weight: 700;
            font-size: .9rem;
            color: #1a1f36;
            margin-bottom: 2px;
        }

        .pesan-card .email {
            font-size: .78rem;
            color: #697386;
            margin-bottom: 8px;
        }

        .pesan-card .isi {
            font-size: .88rem;
            color: #1a1f36;
            background: #f8f9fd;
            border-radius: 12px;
            padding: 12px 16px;
        }

        .pesan-card .waktu {
            font-size: .72rem;
            color: #a3acb9;
        }
    </style>
</head>
<body style="background: #f6f7fb; font-family: 'Plus Jakarta Sans', sans-serif;">

@include('partials.navbar')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">
                    <i class="bi bi-inbox-fill me-2" style="color: #635bff;"></i>Pesan Masuk
                </h2>
                <span class="text-muted" style="font-size: .85rem;">
                    Total {{ $pesans->count() }} pesan dari pengunjung website
                </span>
            </div>
            <a href="{{ url('/home') }}" class="btn btn-light border rounded-pill px-4 fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Dashboard
            </a>
        </div>

        @forelse($pesans as $item)
            <div class="pesan-card">
                <div class="pesan-avatar">
                    {{ strtoupper(substr($item->user->name, 0, 2)) }}
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6>
                                {{ $item->user->name }}
                                @unless($item->dibaca)
                                    <span class="badge bg-success rounded-pill" style="font-size: .55rem;">Baru</span>
                                @endunless
                            </h6>
                            <div class="email">
                                <i class="bi bi-envelope me-1"></i>{{ $item->user->email }}
                            </div>
                        </div>
                        <span class="waktu">
                            <i class="bi bi-clock me-1"></i>{{ $item->created_at->translatedFormat('d M Y, H:i') }}
                        </span>
                    </div>
                    <div class="isi">{{ $item->pesan }}</div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <div class="bg-white rounded-4 shadow-sm p-5" style="max-width: 480px; margin: 0 auto;">
                    <i class="bi bi-inbox display-4 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold">Belum ada pesan masuk</h5>
                    <p class="text-muted small mb-0">Pesan dari pengunjung website akan muncul di sini.</p>
                </div>
            </div>
        @endforelse

    </div>
</section>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>