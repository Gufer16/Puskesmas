<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AkunDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $dokter = dokter::findOrFail($user->id_dokter);

        return view('dokter.akun', compact('user', 'dokter'));
    }

    public function editAkunDokter()
    {
        $user = Auth::user();

        $dokter = dokter::findOrFail($user->id_dokter);

        return view('dokter.editAkun', compact('user', 'dokter'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $dokter = dokter::findOrFail($user->id_dokter);

        $data = $request->validate([
            'nama_dokter'       => 'required|string|max:50',
            'sip'               => 'required|integer|min:10',
            'jenis_kelamin'     => 'required',
            'spesialis'         => 'required|string|max:50',
            'no_hp'             => 'required|numeric',
            'email'             => 'required|email',
            'foto_dokter'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update foto jika ada foto baru
        if ($request->hasFile('foto_dokter')) {
            if ($dokter->foto_dokter) {
                Storage::disk('public')->delete($dokter->foto_dokter);
            }
            $data['foto_dokter'] = $request->file('foto_dokter')->store('img_dokter', 'public');
        }

        $dokter->update($data);

        return redirect()
            ->route('dokter.akun')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
