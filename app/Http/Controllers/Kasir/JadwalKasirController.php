<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\jadwal;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class JadwalKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $jadwals = jadwal::with('dokter', 'pendaftaran')
            ->when($cari, function ($query, $cari) {
                $query->whereHas('dokter', function ($query) use ($cari) {
                    $query->where('nama_dokter', 'like', "%{$cari}%");
                })
                    ->orWhereHas('pendaftaran.pasien', function ($query) use ($cari) {
                        $query->where('nama_pasien', 'like', "%{$cari}%");
                    });
            })->latest()->get();

        return view('kasir.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters      = dokter::all();
        $pendaftarans = pendaftaran::all();

        return view('kasir.jadwal.tambah', compact('dokters', 'pendaftarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_dokter'         => 'required|exists:dokters,id',
            'id_pendaftaran'    => 'required|exists:pendaftarans,id',
            'hari'              => 'required',
            'jam'               => 'required',
        ]);

        jadwal::create($data);

        return redirect()
            ->route('kasirJadwal.index')
            ->with('success', 'Jadwal Pasien Berhasil Ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $kasirJadwal)
    {
        $dokters      = dokter::all();
        $pendaftarans = pendaftaran::all();

        return view('kasir.jadwal.edit', compact('kasirJadwal', 'dokters', 'pendaftarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal $kasirJadwal)
    {
        $data = $request->validate([
            'id_dokter'         => 'required|exists:dokters,id',
            'id_pendaftaran'    => 'required|exists:pendaftarans,id',
            'hari'              => 'required',
            'jam'               => 'required',
        ]);

        $kasirJadwal->update($data);

        return redirect()
            ->route('kasirJadwal.index')
            ->with('success', 'Jadwal Pasien Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $kasirJadwal)
    {
        $kasirJadwal->delete();

        return redirect()
            ->route('kasirJadwal.index')
            ->with('success', 'Jadwal Pasien Berhasil Dihapus.');
    }
}
