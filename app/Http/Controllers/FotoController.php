<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with('album')->latest()->paginate(12);
        return view('fotos.index', compact('fotos'));
    }

    public function create()
    {
        $albums = Album::all();
        return view('fotos.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'album_id'   => 'required|exists:albums,id',
            'lokasi_file'=> 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            'lokasi'     => 'nullable|string|max:255',
            'link_ig'    => 'nullable|url',
            'deskripsi'  => 'nullable|string',
        ]);

        $path = $request->file('lokasi_file')->store('galeri', 'public');

        Foto::create([
            'judul_foto'  => $request->judul_foto,
            'album_id'    => $request->album_id,
            'lokasi_file' => $path,
            'lokasi'      => $request->lokasi,
            'link_ig'     => $request->link_ig,
            'deskripsi'   => $request->deskripsi,
            'user_id'     => auth()->id() ?? 1,
        ]);

        return redirect()->route('fotos.index')->with('success', 'Posting galeri berhasil ditambahkan!');
    }

    public function edit(Foto $foto)
    {
        $albums = Album::all();
        return view('fotos.edit', compact('foto', 'albums'));
    }

    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'album_id'   => 'required|exists:albums,id',
            'lokasi_file'=> 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'lokasi'     => 'nullable|string|max:255',
            'link_ig'    => 'nullable|url',
            'deskripsi'  => 'nullable|string',
        ]);

        $path = $foto->lokasi_file;

        if ($request->hasFile('lokasi_file')) {
            if (Storage::disk('public')->exists($foto->lokasi_file)) {
                Storage::disk('public')->delete($foto->lokasi_file);
            }
            $path = $request->file('lokasi_file')->store('galeri', 'public');
        }

        $foto->update([
            'judul_foto'  => $request->judul_foto,
            'album_id'    => $request->album_id,
            'lokasi_file' => $path,
            'lokasi'      => $request->lokasi,
            'link_ig'     => $request->link_ig,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('fotos.index')->with('success', 'Posting galeri berhasil diperbarui!');
    }

    public function destroy(Foto $foto)
    {
        if (Storage::disk('public')->exists($foto->lokasi_file)) {
            Storage::disk('public')->delete($foto->lokasi_file);
        }

        $foto->delete();
        return redirect()->route('fotos.index')->with('success', 'Posting galeri berhasil dihapus!');
    }
}