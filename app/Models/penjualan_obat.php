<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penjualan_obat extends Model
{
    protected $table = 'penjualan_obats';

    protected $fillable = [
        'id_obat',
        'jumlah_obat',
        'biaya',
        'tanggal_penjualan',
    ];

    public function obats()
    {
        return $this->belongsTo(obat::class, 'id_obat');
    }
}
