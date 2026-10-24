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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 10)->unique();
            $table->string('nama_pasien', 50);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->integer('usia');
            $table->text('alamat');
            $table->string('no_hp', 15)->nullable();
            $table->string('no_bpjs', 25)->nullable();
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('status', ['Menikah', 'Belum Menikah']);
            $table->string('pekerjaan', 50)->nullable();
            $table->string('nama_penanggung', 50)->nullable();
            $table->string('hp_penanggung', 15)->nullable();
            $table->date('tanggal_daftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
