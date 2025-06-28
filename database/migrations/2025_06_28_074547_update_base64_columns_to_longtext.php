<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->longText('foto_rumah')->change();
            $table->longText('pas_foto')->change();
            $table->longText('kartu_bansos')->change();
            $table->longText('bukti_ptn')->change();
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('foto_rumah', 255)->change();
            $table->string('pas_foto', 255)->change();
            $table->string('kartu_bansos', 255)->change();
            $table->string('bukti_ptn', 255)->change();
        });
    }
};

