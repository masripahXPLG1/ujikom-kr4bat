<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Pesan;

class HomeController extends Controller
{
    public function index()
    {
        $totalUser   = User::count();
        $totalGaleri = Galeri::count();
        $totalBerita = Berita::count();
        $pesanBaru   = Pesan::where('dibaca', false)->count();

        return view('home', compact(
            'totalUser',
            'totalGaleri',
            'totalBerita',
            'pesanBaru'
        ));
    }
}