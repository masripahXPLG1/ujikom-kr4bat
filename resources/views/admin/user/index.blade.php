@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h2 style="font-family: 'DM Serif Display', serif;">Kelola User</h2>
    <p class="text-muted mb-0" style="font-size: .85rem;">Daftar akun pengguna sistem.</p>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="font-size: .72rem;" class="text-muted">
                    <th class="p-3">No</th>
                    <th class="p-3">NAMA</th>
                    <th class="p-3">EMAIL</th>
                    <th class="p-3">ROLE</th>
                    <th class="p-3">TERDAFTAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3 fw-bold" style="font-size: .85rem;">{{ $user->name }}</td>
                        <td class="p-3" style="font-size: .82rem;">{{ $user->email }}</td>
                        <td class="p-3">
                            <span class="badge rounded-pill {{ ($user->role ?? '') == 'admin' ? 'bg-primary' : 'bg-secondary' }}">
                                {{ ucfirst($user->role ?? 'user') }}
                            </span>
                        </td>
                        <td class="p-3" style="font-size: .8rem;">{{ $user->created_at->translatedFormat('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted p-5">Belum ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection