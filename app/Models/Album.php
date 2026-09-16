<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    // Relasi: album punya banyak galeri
    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }
}