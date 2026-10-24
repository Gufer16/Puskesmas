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
        Schema::create('biaya_konsultasis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_konsultasi')
                ->constrained('konsultasis');

            $table->foreignId('id_obat')
                ->constrained('obats');

            $table->decimal('biaya_konsultasi', 12, 3);
            $table->integer('jumlah_obat');
            $table->decimal('total_biaya', 12, 3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_konsultasis');
    }
};
