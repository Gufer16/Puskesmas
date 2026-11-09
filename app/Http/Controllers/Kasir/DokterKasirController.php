<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterKasirController extends Controller
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

        return view('kasir.dokter.index', compact(
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
        return view('kasir.dokter.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter'       => 'required|string|max:50',
            'sip'               => 'required|numeric|max_digits:15',
            'jenis_kelamin'     => 'required',
            'spesialis'         => 'required|string|max:50',
            'no_hp'             => 'required|numeric|min_digits:10|max_digits:12',
            'email'             => 'required',
            'foto_dokter'       => [
                'required',
                'image',
                'mimes:png,jpg,jpeg,webp',
                'extensions:png,jpg,jpeg,webp',
                'max:2024',
            ],
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
            ->route('kasirDokter.index')
            ->with('success', 'Dokter Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(dokter $kasirDokter)
    {
        return view('kasir.dokter.detail', compact('kasirDokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dokter $kasirDokter)
    {
        return view('kasir.dokter.edit', compact('kasirDokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dokter $kasirDokter)
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
            if ($kasirDokter->foto_dokter) {
                Storage::disk('public')->delete($kasirDokter->foto_dokter);
            }
            $data['foto_dokter'] = $request->file('foto_dokter')->store('img_dokter', 'public');
        }

        $kasirDokter->update($data);

        return redirect()
            ->route('kasirDokter.index')
            ->with('success', 'Data Dokter Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dokter $kasirDokter)
    {
        if ($kasirDokter->foto_dokter) {
            Storage::disk('public')->delete($kasirDokter->foto_dokter);
        }

        $kasirDokter->delete();

        return redirect()
            ->route('kasirDokter.index')
            ->with('success', 'Data Dokter Berhasil Dihapus.');
    }
}
