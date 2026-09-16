<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|max:1000',
        ]);

        Pesan::create([
            'user_id' => auth()->id(),   //identitas user yang login, otomatis
            'pesan'   => $request->pesan,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}