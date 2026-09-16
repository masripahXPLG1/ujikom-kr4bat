<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'judul_foto',
        'lokasi',
        'link_ig',
        'lokasi_file',
        'deskripsi',
        'user_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}