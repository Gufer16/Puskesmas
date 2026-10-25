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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter', 50);
            $table->string('sip', 25);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('spesialis', 50);
            $table->string('no_hp', 15);
            $table->string('email');
            $table->string('foto_dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
