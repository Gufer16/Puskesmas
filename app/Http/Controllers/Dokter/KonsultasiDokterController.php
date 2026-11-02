<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\konsultasi;
use App\Models\pasien;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiDokterController extends Controller
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

        return view('dokter.konsultasi', compact('konsultasis'));
    }

    public function detailPasien(pasien $pasien)
    {
        $pasien->all();

        return view('dokter.detailPasien', compact('pasien'));
    }

    public function mulaiKonsultasi($pendaftaran)
    {
        $pendaftarans = pendaftaran::with(['pasien'])->findOrFail($pendaftaran);

        return view('dokter.mulaiKonsultasi', compact('pendaftarans'));
    }

    public function mulaiKonsultasiProses(Request $request)
    {
        $data = $request->validate([
            'id_pendaftaran'        => 'required',
            'keluhan'               => 'required|string|max:50',
            'riwayat_penyakit'      => 'required|string|max:50',
            'riwayat_alergi'        => 'required|string|max:50',
            'tekanan_darah'         => 'required|string|max:15',
            'suhu'                  => 'required',
            'bb'                    => 'required',
            'tb'                    => 'required',
            'diagnosa'              => 'required|string|max:50',
            'tindakan'              => 'required|string',
            'resep'                 => 'required',
        ]);

        $data['id_dokter']       = Auth::user()->id_dokter;
        $data['tanggal_periksa'] = today()->toDateString();

        konsultasi::create($data);

        return redirect()
            ->route('dokter.konsultasi')
            ->with('success', 'Konsultasi Pasien Berhasil Tersimpan.');
    }
}
