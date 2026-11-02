<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalDokterController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $dokters = dokter::with([
            'jadwal' => function ($query) use ($cari) {
                $query->with('pendaftaran.pasien')
                    ->when($cari, function ($query) use ($cari) {
                        $query->where('hari', 'like', "%{$cari}%")
                            ->orWhereHas('pendaftaran.pasien', function ($query) use ($cari) {
                                $query->where('nama_pasien', 'like', "%{$cari}%");
                            });
                    });
            }
        ])
            ->where('id', Auth::user()->id_dokter)
            ->firstOrFail();

        return view('dokter.jadwal', compact('dokters', 'cari'));
    }
}
