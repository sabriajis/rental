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
            $table->unsignedBigInteger('user_id')->after('mobil_id'); // Sesuaikan posisi kolom jika perlu
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Tambahkan relasi jika diperlukan

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sewas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
        });
    }
};
