<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            // Ubah foreignId menjadi unsignedBigInteger agar aman jika tabel albums urutannya belakangan
            $table->unsignedBigInteger('album_id');
            $table->string('judul_foto');
            $table->string('lokasi')->nullable();
            $table->string('link_ig')->nullable();
            $table->string('lokasi_file');
            $table->text('deskripsi')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();

            // Relasi foreign key ditulis terpisah agar tidak error saat pembuatan tabel
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};