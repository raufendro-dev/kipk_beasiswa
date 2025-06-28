<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('akte_kelahiran');
            $table->string('akte_keluarga');
            $table->string('kks');
            $table->string('foto_rumah');
            $table->string('ijazah');
            $table->string('raport');
            $table->string('pas_foto');
            $table->string('shun');
            $table->string('prestasi')->nullable();
            $table->string('kartu_bansos');
            $table->string('sktm')->nullable();
            $table->string('penghasilan');
            $table->string('bukti_ptn');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
