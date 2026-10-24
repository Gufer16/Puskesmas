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
        Schema::create('penjualan_obats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_obat')
                ->constrained('obats');

            $table->integer('jumlah_obat');
            $table->decimal('biaya', 12, 3);
            $table->date('tanggal_penjualan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_obats');
    }
};
