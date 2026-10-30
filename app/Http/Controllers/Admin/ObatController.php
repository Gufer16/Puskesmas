<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $obats = obat::when($cari, function ($query, $cari) {
            $query->where('kode_obat', 'like', "%{$cari}%")
                ->orWhere('nama_obat', 'like', "%{$cari}%")
                ->orWhere('jenis_obat', 'like', "%{$cari}%")
                ->orWhere('stok_obat', 'like', "%{$cari}%")
                ->orWhere('harga_satuan', 'like', "%{$cari}%")
                ->orWhere('tanggal_kadaluarsa', 'like', "%{$cari}%");
        })->latest()->get();

        return view('admin.obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obat.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_obat'             => 'required|string|max:15|unique:obats,kode_obat',
            'nama_obat'             => 'required|string|max:30|unique:obats,nama_obat',
            'jenis_obat'            => 'required',
            'stok_obat'             => 'required|numeric',
            'harga_satuan'          => 'required|numeric',
            'tanggal_kadaluarsa'    => 'required',
        ]);

        obat::create($data);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $obats = obat::latest()->get();

        return view('admin.obat.detail', compact('obats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(obat $obat)
    {
        return view('admin.obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, obat $obat)
    {
        $data = $request->validate([
            'kode_obat'             => [
                'required',
                'string',
                'max:15',
                Rule::unique('obats', 'kode_obat')->ignore($obat->id)
            ],
            'nama_obat'             => [
                'required',
                'string',
                'max:30',
                Rule::unique('obats', 'nama_obat')->ignore($obat->id)
            ],
            'jenis_obat'            => 'required',
            'stok_obat'             => 'required|numeric',
            'harga_satuan'          => 'required|numeric',
            'tanggal_kadaluarsa'    => 'required',
        ]);

        $obat->update($data);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data Obat Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(obat $obat)
    {
        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data Obat Berhasil Dihapus.');
    }

    public function tambahStok(obat $obat)
    {
        return view('admin.obat.tambahStok', compact('obat'));
    }

    public function tambahStokProses(Request $request, obat $obat)
    {
        $data = $request->validate([
            'jumlah_stok' => 'required|integer|min:1',
        ]);

        $obat->increment('stok_obat', $data['jumlah_stok']);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Stok obat berhasil ditambahkan.');
    }
}
