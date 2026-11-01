<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerantaraController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.perantara');
    }

    public function dokter()
    {
        $dokters = dokter::all();

        return view('admin.pengguna.tambahDokter', compact('dokters'));
    }

    public function tambahDokter(Request $request)
    {
        $data = $request->validate([
            'id_dokter'         => 'required|exists:dokters,id',
            'username'          => 'required|unique:users,username',
            'password'          => 'required|min:6',
            'email'             => 'required|min:6',
            'role'              => 'required',
        ]);

        DB::transaction(function () use ($data) {
            $dokter = dokter::where('id', $data['id_dokter'])->lockForUpdate()->firstOrFail();

            $data['nama'] = $dokter->nama_dokter;

            User::create($data);
        });

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Akun Dokter Berhasil Dibuat.');
    }
}
