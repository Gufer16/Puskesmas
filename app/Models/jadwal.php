<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwals';

    protected $fillable = [
        'id_dokter',
        'id_pendaftaran',
        'hari',
        'jam',
    ];

    public function dokters()
    {
        return $this->belongsTo(dokter::class, 'id_dokter');
    }

    public function pendaftarans()
    {
        return $this->belongsTo(pendaftaran::class, 'id_pendaftaran');
    }
}
