<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\konsultasi;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('admin.konsultasi.index', compact('konsultasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftarans = pendaftaran::all();
        $dokters      = dokter::all();

        return view('admin.konsultasi.tambah', compact('pendaftarans', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pendaftaran'        => 'required|exists:pendaftarans,id',
            'id_dokter'             => 'required|exists:dokters,id',
            'keluhan'               => 'required',
            'riwayat_penyakit'      => 'required',
            'riwayat_alergi'        => 'required',
            'tekanan_darah'         => 'required',
            'suhu'                  => 'required',
            'bb'                    => 'required',
            'tb'                    => 'required',
            'diagnosa'              => 'required',
            'tindakan'              => 'required',
            'resep'                 => 'required',
        ]);
        $data['tanggal_periksa'] = today()->toDateString();

        konsultasi::create($data);

        return redirect()
            ->route('konsultasi.index')
            ->with('success', 'Data Konsultasi Berhasil Tersimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(konsultasi $konsultasi)
    {
        $konsultasi->load('pendaftaran', 'dokter');

        return view('admin.konsultasi.detail', compact('konsultasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konsultasi $konsultasi)
    {
        $pendaftarans = pendaftaran::all();
        $dokters      = dokter::all();

        return view('admin.konsultasi.edit', compact('konsultasi', 'pendaftarans', 'dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, konsultasi $konsultasi)
    {
        $data = $request->validate([
            'id_pendaftaran'        => 'required|exists:pendaftarans,id',
            'id_dokter'             => 'required|exists:dokters,id',
            'keluhan'               => 'required',
            'riwayat_penyakit'      => 'required',
            'riwayat_alergi'        => 'required',
            'tekanan_darah'         => 'required',
            'suhu'                  => 'required',
            'bb'                    => 'required',
            'tb'                    => 'required',
            'diagnosa'              => 'required',
            'tindakan'              => 'required',
            'resep'                 => 'required',
            'tanggal_periksa'       => 'required',
        ]);

        $konsultasi->update($data);

        return redirect()
            ->route('konsultasi.index')
            ->with('success', 'Data Konsultasi Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konsultasi $konsultasi)
    {
        $konsultasi->delete();

        return redirect()
            ->route('konsultasi.index')
            ->with('success', 'Data Konsultasi Berhasil Dihapus.');
    }
}
