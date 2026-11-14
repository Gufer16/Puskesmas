<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\konsultasi;
use Illuminate\Http\Request;

class KonsultasiKasirController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $konsultasis = konsultasi::with('pendaftaran', 'dokter')
            ->when($cari, function ($query, $cari) {
                $query->whereHas('dokter', function ($query) use ($cari) {
                    $query->where('nama_dokter', 'like', "%{$cari}%");
                })
                    ->orWhereHas('pendaftaran.pasien', function ($query) use ($cari) {
                        $query->where('nama_pasien', 'like', "%{$cari}%");
                    });
            })->latest()->get();

        return view('kasir.konsultasi.index', compact('konsultasis'));
    }

    public function show(konsultasi $kasirKonsultasi)
    {
        $kasirKonsultasi->load('pendaftaran', 'dokter');

        return view('kasir.konsultasi.detail', compact('kasirKonsultasi'));
    }
}
