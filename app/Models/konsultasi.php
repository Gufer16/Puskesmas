<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    protected $table = 'konsultasis';

    protected $fillable = [
        'id_pendaftaran',
        'id_dokter',
        'keluhan',
        'riwayat_penyakit',
        'riwayat_alergi',
        'tekanan_darah',
        'suhu',
        'bb',
        'tb',
        'diagnosa',
        'tindakan',
        'resep',
        'tanggal_periksa',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(pendaftaran::class, 'id_pendaftaran');
    }

    public function dokter()
    {
        return $this->belongsTo(dokter::class, 'id_dokter');
    }
}
