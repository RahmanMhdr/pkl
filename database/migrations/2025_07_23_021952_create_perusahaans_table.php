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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama lengkap
            $table->string('jk', 2); // L atau P
            $table->string('alamat')->nullable(); // Opsional
            $table->string('jabatan')->nullable(); // Manager, Staff, dll
            $table->date('tgl')->nullable(); // Tanggal Lahir
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
