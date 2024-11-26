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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobil_id'); // Relasi dengan tabel mobil
            $table->string('nama');
            $table->string('email');
            $table->string('phone');
            $table->string('alamat');
            $table->integer('durasi'); // Durasi sewa dalam hari
            $table->integer('total'); // Total pembayaran
            $table->string('status')->default('pending'); // Status pembayaran, bisa 'pending', 'paid', 'cancelled'
            $table->timestamps();

            // Menambahkan foreign key untuk kolom mobil_id
            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
