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
        $konsultasis = konsultasi::all();
        $obats       = obat::all();

        return view('admin.biayaKonsultasi.tambah', compact('konsultasis', 'obats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_konsultasi'    => 'required|exists:konsultasis,id',
            'id_obat'          => 'required|exists:obats,id',
            'biaya_konsultasi' => 'required|numeric|min:0',
            'jumlah_obat'      => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($data) {

            $obat = obat::where('id', $data['id_obat'])
                ->lockForUpdate()
                ->firstOrFail();

            // Memeriksa stok obat
            if ($data['jumlah_obat'] > $obat->stok_obat) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'jumlah_obat' => 'Stok obat tidak mencukupi. Stok tersedia: '
                        . $obat->stok_obat,
                ]);
            }

            // Mengurangi stok obat
            $obat->decrement('stok_obat', $data['jumlah_obat']);

            // Menghitung total biaya
            $data['total_biaya'] = $data['biaya_konsultasi']
                + ($obat->harga_satuan * $data['jumlah_obat']);

            // Menyimpan transaksi
            biaya_konsultasi::create($data);
        });

        return redirect()
            ->route('biayaKonsultasi.index')
            ->with('success', 'Biaya konsultasi berhasil tersimpan.');
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
    public function edit(biaya_konsultasi $biayaKonsultasi)
    {
        $konsultasis = konsultasi::all();
        $obats       = obat::all();

        return view('admin.biayaKonsultasi.edit', compact('biayaKonsultasi', 'konsultasis', 'obats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, biaya_konsultasi $biayaKonsultasi)
    {
        $data = $request->validate([
            'id_konsultasi'    => 'required|exists:konsultasis,id',
            'id_obat'          => 'required|exists:obats,id',
            'biaya_konsultasi' => 'required|numeric|min:0',
            'jumlah_obat'      => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($data, $biayaKonsultasi) {

            // Mengambil transaksi lama
            $biaya = biaya_konsultasi::where('id', $biayaKonsultasi->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Mengunci data obat lama dan obat baru
            $idObat = collect([
                $biaya->id_obat,
                $data['id_obat'],
            ])->unique()->sort()->values();

            $obats = obat::whereIn('id', $idObat)
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            $obatLama = $obats->get($biaya->id_obat);
            $obatBaru = $obats->get($data['id_obat']);

            // Menghitung stok yang tersedia untuk transaksi baru
            $stokTersedia = $obatBaru->stok_obat;

            // Jika obatnya sama, perhitungkan stok dari transaksi lama
            if ($biaya->id_obat == $data['id_obat']) {
                $stokTersedia += $biaya->jumlah_obat;
            }

            // Memeriksa kecukupan stok
            if ($stokTersedia < $data['jumlah_obat']) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'jumlah_obat' => 'Stok obat tidak mencukupi. Stok tersedia: '
                        . $stokTersedia,
                ]);
            }

            // Mengembalikan stok transaksi lama
            $obatLama->increment('stok_obat', $biaya->jumlah_obat);

            // Mengurangi stok sesuai transaksi baru
            $obatBaru->decrement('stok_obat', $data['jumlah_obat']);

            // Menghitung total biaya terbaru
            $data['total_biaya'] = $data['biaya_konsultasi']
                + ($obatBaru->harga_satuan * $data['jumlah_obat']);

            // Memperbarui data transaksi
            $biaya->update($data);
        });

        return redirect()
            ->route('biayaKonsultasi.index')
            ->with('success', 'Biaya konsultasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(biaya_konsultasi $biayaKonsultasi)
    {
        $biayaKonsultasi->delete();

        return redirect()
            ->route('biayaKonsultasi.index')
            ->with('success', 'Biaya Konsultasi Berhasil Dihapus.');
    }
}
