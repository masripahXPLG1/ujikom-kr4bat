<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Ambil kode post dari link IG
    // contoh: https://www.instagram.com/p/Cxyz123abc/ -> Cxyz123abc
    private function kodeIg($url)
    {
        preg_match('/(?:p|reel|tv)\/([A-Za-z0-9_-]+)/', $url, $m);
        return $m[1] ?? null;
    }

    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link_ig'   => ['required', 'url', 'regex:/instagram\.com/i'],
            'kategori'  => 'required|string|max:100',
            'deskripsi' => 'required|string|max:1000',
            'lokasi'    => 'nullable|string|max:100',
        ]);

        Galeri::create([
            'link_ig'   => $request->link_ig,
            'kode_ig'   => $this->kodeIg($request->link_ig),
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi'    => $request->lokasi,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function show(Galeri $galeri)
    {
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'link_ig'   => ['required', 'url', 'regex:/instagram\.com/i'],
            'kategori'  => 'required|string|max:100',
            'deskripsi' => 'required|string|max:1000',
            'lokasi'    => 'nullable|string|max:100',
        ]);

        $galeri->update([
            'link_ig'   => $request->link_ig,
            'kode_ig'   => $this->kodeIg($request->link_ig),
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi'    => $request->lokasi,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diperbarui!');
    }

       public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return back()->with('success', 'Galeri berhasil dihapus!');
    }
}