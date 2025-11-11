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
        Schema::table('barang', function (Blueprint $table) {
            // Menambahkan kolom lab_id untuk relasi dengan tabel lab
            $table->foreignId('lab_id')->constrained('lab')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            // Menghapus relasi dan kolom lab_id jika migrasi di-rollback
            $table->dropForeign(['lab_id']);
            $table->dropColumn('lab_id');
        });
    }
};
