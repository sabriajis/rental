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
        Schema::table('sewas', function (Blueprint $table) {
               // Ubah kolom 'status' menjadi ENUM
               $table->enum('status', ['Menunggu Pembayaran', 'Berhasil Melakukan Pembayaran'])->default('Menunggu Pembayaran')->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sewas', function (Blueprint $table) {
           // Mengembalikan kolom 'status' ke tipe sebelumnya (misalnya varchar atau text)
           $table->string('status')->default('Menunggu Pembayaran')->change();
       
        });
    }
};
