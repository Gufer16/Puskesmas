<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    protected $table = 'pendaftarans';

    protected $fillable = [
        'id_pasien',
        'tanggal_daftar',
        'no_antrian',
        'jenis_kunjungan',
    ];

    public function pasiens()
    {
        return $this->belongsTo(pasien::class, 'id_pasien');
    }
}
