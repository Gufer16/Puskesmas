<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\biaya_konsultasi;
use App\Models\konsultasi;
use App\Models\obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class BiayaKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $biayaKonsultasis = biaya_konsultasi::with('konsultasi', 'obat')
            ->when($cari, function ($query, $cari) {
                $query->whereHas('konsultasi.pendaftaran.pasien', function ($query) use ($cari) {
                    $query->where('nama_pasien', 'like', "%{$cari}%");
                });
            })->latest()->get();

        return view('admin.biayaKonsultasi.index', compact('biayaKonsultasis'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(biaya_konsultasi $biayaKonsultasi)
    {
        $biayaKonsultasi->load('konsultasi', 'obat');

        return view('admin.biayaKonsultasi.detail', compact('biayaKonsultasi'));
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
