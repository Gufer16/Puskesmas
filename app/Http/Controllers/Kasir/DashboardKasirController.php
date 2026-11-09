<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\jadwal;
use App\Models\konsultasi;
use App\Models\obat;
use App\Models\pasien;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class DashboardKasirController extends Controller
{
    public function index()
    {
        $tanggal = today();
        $data = [
            'pasien'      => pasien::count(),
            'dokter'      => dokter::count(),
            'pendaftaran' => pendaftaran::count(),
            'jadwal'      => jadwal::count(),
            'konsultasi'  => konsultasi::count(),
            'obat'        => obat::count(),
        ];

        return view('kasir.dashboard', compact('data'));
    }
}
