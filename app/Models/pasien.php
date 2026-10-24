<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = 'pasiens';

    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'alamat',
        'no_hp',
        'no_bpjs',
        'gol_darah',
        'status',
        'pekerjaan',
        'nama_penanggung',
        'hp_penanggung',
        'tanggal_daftar',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(pendaftaran::class, 'id_pasien');
    }
}
