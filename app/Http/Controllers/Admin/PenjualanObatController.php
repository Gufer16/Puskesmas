<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\obat;
use App\Models\penjualan_obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $penjualanObats = penjualan_obat::with('obat')
            ->when($cari, function ($query, $cari) {
                $query->whereHas('obat', function ($query) use ($cari) {
                    $query->where('nama_obat', 'like', "%{$cari}%")
                        ->orWhere('jenis_obat', 'like', "%{$cari}%");
                });
            })->latest()->get();

        return view('admin.penjualanObat.index', compact('penjualanObats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obats = obat::all();

        return view('admin.penjualanObat.tambah', compact('obats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_obat'     => 'required|exists:obats,id',
            'jumlah_obat' => 'required|integer|min:1',
        ]);

        $totalBiaya = DB::transaction(function () use ($data) {

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
            $data['biaya'] = $obat->harga_satuan * $data['jumlah_obat'];

            // Menyimpan tanggal penjualan
            $data['tanggal_penjualan'] = today()->toDateString();

            // Menyimpan transaksi
            penjualan_obat::create($data);

            return $data['biaya'];
        });

        return redirect()
            ->route('penjualanObat.index')
            ->with('success', 'Penjualan Obat Berhasil, Biaya: Rp. ' . number_format($totalBiaya, 0, ',', '.'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $penjualanObats = penjualan_obat::with('obat')->latest()->get();

        return view('admin.penjualanObat.detail', compact('penjualanObats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penjualan_obat $penjualanObat)
    {
        $obats = obat::all();

        return view('admin.penjualanObat.edit', compact('penjualanObat', 'obats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penjualan_obat $penjualanObat)
    {
        $data = $request->validate([
            'id_obat'               => 'required|exists:obats,id',
            'jumlah_obat'           => 'required|integer|min:1',
            'tanggal_penjualan'     => 'nullable',
        ]);

        $totalBiaya = DB::transaction(function () use ($data, $penjualanObat) {

            // Mengambil transaksi lama
            $biaya = penjualan_obat::where('id', $penjualanObat->id)
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
            $data['biaya'] = $obatBaru->harga_satuan * $data['jumlah_obat'];

            // Memperbarui data transaksi
            $biaya->update($data);

            return $data['biaya'];
        });

        return redirect()
            ->route('penjualanObat.index')
            ->with('success', 'Penjualan Obat Berhasil Diperbarui, Biaya: Rp. ' . number_format($totalBiaya, 0, ',', '.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penjualan_obat $penjualanObat)
    {
        $penjualanObat->delete();

        return redirect()
            ->route('penjualanObat.index')
            ->with('success', 'Data Penjualan Obat Berhasil Dihapus.');
    }
}
