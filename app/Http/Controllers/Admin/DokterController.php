<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $dokters = dokter::when($cari, function ($query, $cari) {
            $query->where('nama_dokter', 'like', "%{$cari}%")
                ->orWhere('sip', 'like', "%{$cari}%")
                ->orWhere('jenis_kelamin', 'like', "%{$cari}%")
                ->orWhere('spesialis', 'like', "%{$cari}%");
        })->latest()->get();

        $jumlahDokter    = dokter::count();
        $DokterLaki      = dokter::where('jenis_kelamin', 'Laki-laki')->count();
        $DokterPerempuan = dokter::where('jenis_kelamin', 'Perempuan')->count();

        return view('admin.dokter.index', compact(
            'cari',
            'dokters',
            'jumlahDokter',
            'DokterLaki',
            'DokterPerempuan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dokter.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter'       => 'required|string|max:50',
            'sip'               => 'required|numeric|max_digits:25',
            'jenis_kelamin'     => 'required',
            'spesialis'         => 'required|string|max:50',
            'no_hp'             => 'required|numeric|max_digits:12',
            'email'             => 'required',
            'foto_dokter'       => 'required|image|mimes:png,jpg,jpeg,webp|max:2024',
        ]);

        dokter::create([
            'nama_dokter'       => $request->nama_dokter,
            'sip'               => $request->sip,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'spesialis'         => $request->spesialis,
            'no_hp'             => $request->no_hp,
            'email'             => $request->email,
            'foto_dokter'       => $request->file('foto_dokter')->store('img_dokter', 'public'),
        ]);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Dokter Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(dokter $dokter)
    {
        return view('admin.dokter.detail', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dokter $dokter)
    {
        $data = $request->validate([
            'nama_dokter'       => 'required|string|max:50',
            'sip'               => 'required|numeric|max_digits:25',
            'jenis_kelamin'     => 'required',
            'spesialis'         => 'required|string|max:50',
            'no_hp'             => 'required|numeric|max_digits:12',
            'email'             => 'required',
            'foto_dokter'       => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2024',
        ]);

        if ($request->hasFile('foto_dokter')) {
            if ($dokter->foto_dokter) {
                Storage::disk('public')->delete($dokter->foto_dokter);
            }
            $data['foto_dokter'] = $request->file('foto_dokter')->store('img_dokter', 'public');
        }

        $dokter->update($data);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data Dokter Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dokter $dokter)
    {
        if ($dokter->foto_dokter) {
            Storage::disk('public')->delete($dokter->foto_dokter);
        }

        $dokter->delete();

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data Dokter Berhasil Dihapus.');
    }
}
