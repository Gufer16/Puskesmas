<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\jadwal;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $jadwals = jadwal::with('dokters', 'pendaftarans')
            ->when($cari, function ($query, $cari) {
                $query->whereHas('dokters', function ($query) use ($cari) {
                    $query->where('nama_dokter', 'like', "%{$cari}%");
                })
                    ->orWhereHas('pendaftarans.pasien', function ($query) use ($cari) {
                        $query->where('nama_pasien', 'like', "%{$cari}%");
                    });
            })->latest()->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters      = dokter::all();
        $pendaftarans = pendaftaran::all();

        return view('admin.jadwal.tambah', compact('dokters', 'pendaftarans'));
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
            ->route('jadwal.index')
            ->with('success', 'Jadwal Pasien Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        $dokters      = dokter::all();
        $pendaftarans = pendaftaran::all();

        return view('admin.jadwal.edit', compact('jadwal', 'dokters', 'pendaftarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jadwal $jadwal)
    {
        $data = $request->validate([
            'id_dokter'         => 'required|exists:dokters,id',
            'id_pendaftaran'    => 'required|exists:pendaftarans,id',
            'hari'              => 'required',
            'jam'               => 'required',
        ]);

        $jadwal->update($data);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal Pasien Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal Pasien Berhasil Dihapus.');
    }
}
