<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    protected $table = 'obats';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'jenis_obat',
        'stok_obat',
        'harga_satuan',
        'tanggal_kadaluarsa',
    ];

    public function biaya_konsultasis()
    {
        return $this->hasMany(biaya_konsultasi::class, 'id_obat');
    }

    public function penjualan_obats()
    {
        return $this->hasMany(penjualan_obat::class, 'id_obat');
    }
}
