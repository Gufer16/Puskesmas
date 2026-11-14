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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $string)
    {
        //
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
    public function edit(string $string)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $string)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $string)
    {
        //
    }
}
