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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pendaftaran')
                ->constrained('pendaftarans');

            $table->foreignId('id_dokter')
                ->constrained('dokters');

            $table->string('keluhan', 50);
            $table->string('riwayat_penyakit', 50);
            $table->string('riwayat_alergi', 50);
            $table->string('tekanan_darah', 15);
            $table->decimal('suhu', 4, 1);
            $table->decimal('bb', 5, 2);
            $table->decimal('tb', 5, 2);
            $table->string('diagnosa', 50);
            $table->text('tindakan');
            $table->string('resep', 30);
            $table->date('tanggal_periksa');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
