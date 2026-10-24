<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class biaya_konsultasi extends Model
{
    protected $table = 'biaya_konsultasis';

    protected $fillable = [
        'id_konsultasi',
        'id_obat',
        'biaya_konsultasi',
        'jumlah_obat',
        'total_biaya',
    ];

    public function obats()
    {
        return $this->belongsTo(obat::class, 'id_obat');
    }

    public function konsultasis()
    {
        return $this->belongsTo(konsultasi::class, 'id_konsultasi');
    }
}
