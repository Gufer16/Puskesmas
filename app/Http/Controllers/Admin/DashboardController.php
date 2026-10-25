<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\jadwal;
use App\Models\konsultasi;
use App\Models\obat;
use App\Models\pasien;
use App\Models\pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
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

        return view('admin.dashboard', compact('data'));
    }
}
