<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKonsultasiController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $konsultasis = dokter::with([
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

        return view('dokter.riwayatKonsultasi', compact('konsultasis'));
    }

    public function lihatRiwayat(konsultasi $konsultasi)
    {
        return view('dokter.lihatRiwayat', compact('konsultasi'));
    }
}
