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
    Schema::create('karyawans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jk', 2);
        $table->string('alamat')->nullable();
        $table->string('jabatan')->nullable();
        $table->date('tgl')->nullable();
        $table->foreignId('departemen_id')->constrained()->onDelete('cascade');
        $table->softDeletes();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
