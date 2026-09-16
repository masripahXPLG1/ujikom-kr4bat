<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Models\Foto;
use App\Models\Pesan;
use App\Models\Galeri;
use App\Models\Berita;

// ===== LANDING PAGE (publik) =====
Route::get('/', function () {
    $galeris = Galeri::latest()->take(6)->get();
    $beritas = Berita::latest()->take(4)->get();
    return view('welcome', compact('galeris', 'beritas'));
});

// ===== Berita lengkap (publik) =====
Route::get('/berita-semua', function () {
    $beritas = Berita::latest()->paginate(9);
    return view('berita-semua', compact('beritas'));
})->name('berita.semua');

// ===== Detail Berita (publik) =====
Route::get('/berita/{berita}', function (Berita $berita) {
    return view('berita-detail', compact('berita'));
})->where('berita', '[0-9]+')->name('berita.show');

// ===== Galeri lengkap (publik) =====
Route::get('/galeri-semua', function () {
    $query = Galeri::latest();

    if (request('kategori')) {
        $query->where('kategori', request('kategori'));
    }

    $galeris = $query->paginate(9);
    return view('galeri-semua', compact('galeris'));
})->name('galeri.semua');

// ===== Program Keahlian =====
Route::get('/program/pplg', fn () => view('pplg'))->name('program.pplg');
Route::get('/program/tjkt', fn () => view('tjkt'))->name('program.tjkt');
Route::get('/program/tpfl', fn () => view('tpfl'))->name('program.tpfl');
Route::get('/program/to',   fn () => view('to'))->name('program.to');

// ===== Auth =====
Auth::routes();

// ===== USER BIASA (cukup login) =====
Route::middleware('auth')->group(function () {
    Route::get('/akun', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::post('/kontak-kirim', [PesanController::class, 'store'])->name('pesan.kirim');
});

// ===== ADMIN (login + role admin) =====
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // CRUD Berita (show dikecualikan, dipakai halaman publik di atas)
    Route::resource('berita', BeritaController::class)
        ->except(['show'])
        ->parameters(['berita' => 'berita']);

    // CRUD Foto
    Route::resource('fotos', FotoController::class);

    // CRUD Galeri via link IG
    Route::resource('galeri', GaleriController::class)->names('admin.galeri');

    //kelola users
    Route::get('/kelola-user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    Route::get('/admin/pesan', function () {
        Pesan::where('dibaca', false)->update(['dibaca' => true]);
        $pesans = Pesan::with('user')->latest()->get();
        return view('admin.pesan', compact('pesans'));
    })->name('admin.pesan');
});