<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'kategori',
        'link_ig',
        'kode_ig',
        'deskripsi',
        'lokasi',
    ];
}