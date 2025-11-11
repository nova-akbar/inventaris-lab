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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 50)->default('petugas'); // contoh role: admin / petugas
            $table->unsignedBigInteger('lab_id')->nullable(); // lab tempat bertugas

            $table->foreign('lab_id')->references('id')->on('lab')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['lab_id']);
            $table->dropColumn(['role', 'lab_id']);
        });
    }
};
