<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1) tambah kolom kategori
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('id');
        });

        // 2) lepas foreign key, hapus album_id
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropForeign(['album_id']);
            $table->dropColumn('album_id');
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->foreignId('album_id')->nullable();
        });

        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};