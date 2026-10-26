<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\pasien;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $pendaftarans = pendaftaran::with('pasien')
            ->when($cari, function ($query, $cari) {
                $query->whereHas('pasien', function ($query) use ($cari) {
                    $query->where('nama_pasien', 'like', "%{$cari}%")
                        ->orWhere('no_antrian', 'like', "%{$cari}%")
                        ->orWhere('jenis_kunjungan', 'like', "%{$cari}%")
                        ->orWhere('tanggal_daftar', 'like', "%{$cari}%");
                });
            })->latest()->get();

        $jumlahDaftar = pendaftaran::count();

        return view('admin.pendaftaran.index', compact('pendaftarans', 'jumlahDaftar', 'cari'));
    }

    public function noAntrian()
    {
        $tanggal = today()->toDateString();

        $noTerakhir = pendaftaran::whereDate('tanggal_daftar', $tanggal)
            ->max('no_antrian') ?? 0;

        return $noTerakhir + 1;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens     = pasien::all();
        $no_antrian  = $this->noAntrian();

        return view('admin.pendaftaran.tambah', compact('pasiens', 'no_antrian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pasien'         => 'required|exists:pasiens,id',
            'no_antrian'        => 'required|unique:pendaftarans,no_antrian',
            'jenis_kunjungan'   => 'required|string|max:100',
        ]);
        $data['tanggal_daftar'] = today()->toDateString();

        pendaftaran::create($data);

        return redirect()
            ->route('pendaftaran.index')
            ->with('success', 'Pendaftaran Pasien Berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pendaftaran $pendaftaran)
    {
        $pasiens = pasien::all();

        return view('admin.pendaftaran.edit', compact('pendaftaran', 'pasiens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pendaftaran $pendaftaran)
    {
        $data = $request->validate([
            'id_pasien'         => 'required|exists:pasiens,id',
            'tanggal_daftar'    => 'required',
            'no_antrian'        => ['required', Rule::unique('pendaftarans', 'no_antrian')->ignore($pendaftaran->id),],
            'jenis_kunjungan'   => 'required|string|max:100',
        ]);

        $pendaftaran->update($data);

        return redirect()
            ->route('pendaftaran.index')
            ->with('success', 'Data Pendaftaran Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()
            ->route('pendaftaran.index')
            ->with('success', 'Data Pendaftaran Berhasil Dihapus.');
    }
}
