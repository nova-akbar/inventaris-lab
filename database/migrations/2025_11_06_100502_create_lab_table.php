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
        Schema::create('lab', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key dan auto increment
            $table->string('nama_lab', 100)->unique(); // Membuat kolom 'nama_lab' dengan tipe string (maks. 100 karakter) dan nilainya harus unik
            $table->timestamps(); // Membuat dua kolom otomatis: 'created_at' dan 'updated_at' untuk mencatat waktu data dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab');
    }
};
