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
        Schema::create('sirkulasi', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pinjam');
            $table->string('tgl_kembali');
            $table->string('denda');
            $table->string('kondisi');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('kode_buku');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kode_buku')->references('id')->on('buku')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sirkulasi');
    }
};
