<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\pasien;
use Illuminate\Http\Request;

class PasienKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $pasiens = pasien::when($cari, function ($query, $cari) {
            $query->where('no_rm', 'like', "%{$cari}%")
                ->orWhere('nama_pasien', 'like', "%{$cari}%")
                ->orWhere('jenis_kelamin', 'like', "%{$cari}%")
                ->orWhere('usia', 'like', "%{$cari}%");
        })->latest()->get();

        $jumlahPasien    = pasien::count();
        $pasienLaki      = pasien::where('jenis_kelamin', 'Laki-laki')->count();
        $pasienPerempuan = pasien::where('jenis_kelamin', 'Perempuan')->count();

        return view('kasir.pasien.index', compact(
            'pasiens',
            'jumlahPasien',
            'pasienLaki',
            'pasienPerempuan',
            'cari'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.pasien.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'no_rm'                 => 'required|unique:pasiens,no_rm',
            'nama_pasien'           => 'required|string|max:50',
            'jenis_kelamin'         => 'required',
            'tempat_lahir'          => 'required|string|max:20',
            'tanggal_lahir'         => 'required',
            'usia'                  => 'required|numeric',
            'alamat'                => 'required',
            'no_hp'                 => 'numeric',
            'no_bpjs'               => 'numeric|nullable',
            'gol_darah'             => 'required',
            'status'                => 'required',
            'pekerjaan'             => 'string|max:50|nullable',
            'nama_penanggung'       => 'string|max:50|nullable',
            'hp_penanggung'         => 'numeric|nullable',
        ]);

        $data['tanggal_daftar'] = today();

        pasien::create($data);

        return redirect()
            ->route('kasirPasien.index')
            ->with('success', 'Pasien Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pasien $kasirPasien)
    {
        return view('kasir.pasien.detail', compact('kasirPasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pasien $kasirPasien)
    {
        return view('kasir.pasien.edit', compact('kasirPasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pasien $kasirPasien)
    {
        $data = $request->validate([
            'no_rm'                 => 'required',
            'nama_pasien'           => 'required|string|max:50',
            'jenis_kelamin'         => 'required',
            'tempat_lahir'          => 'required|string|max:20',
            'tanggal_lahir'         => 'required',
            'usia'                  => 'required|numeric',
            'alamat'                => 'required',
            'no_hp'                 => 'numeric',
            'no_bpjs'               => 'numeric|nullable',
            'gol_darah'             => 'required',
            'status'                => 'required',
            'pekerjaan'             => 'string|max:50|nullable',
            'nama_penanggung'       => 'string|max:50|nullable',
            'hp_penanggung'         => 'numeric|nullable',
        ]);

        $data['tanggal_daftar'] = today();

        $kasirPasien->update($data);

        return redirect()
            ->route('kasirPasien.index')
            ->with('success', 'Data Pasien Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pasien $kasirPasien)
    {
        $kasirPasien->delete();

        return redirect()
            ->route('kasirPasien.index')
            ->with('success', 'Data Pasien Berhasil Dihapus.');
    }
}
