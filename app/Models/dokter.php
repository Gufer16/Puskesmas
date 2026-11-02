<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    protected $table = 'dokters';

    protected $fillable = [
        'nama_dokter',
        'sip',
        'jenis_kelamin',
        'spesialis',
        'no_hp',
        'email',
        'foto_dokter',
    ];

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'id_dokter');
    }

    public function konsultasi()
    {
        return $this->hasMany(konsultasi::class, 'id_dokter');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_dokter');
    }
}
