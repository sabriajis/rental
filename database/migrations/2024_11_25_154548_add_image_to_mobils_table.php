<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            // Menambahkan kolom image
            $table->string('image')->nullable(); // Gambar bisa kosong
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
             // Menghapus kolom image jika migrasi dibatalkan
             $table->dropColumn('image');
        });
    }
};
