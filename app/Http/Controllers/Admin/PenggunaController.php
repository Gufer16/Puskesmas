<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;

        $penggunas = User::when($cari, function ($query, $cari) {
            $query->where('nama', 'like', "%{$cari}%")
                ->orWhere('username', 'like', "%{$cari}%")
                ->orWhere('role', 'like', "%{$cari}%");
        })->latest()->get();

        $totalPengguna = User::count();

        return view('admin.pengguna.index', compact('penggunas', 'totalPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:50',
            'username'      => 'required|string|max:50|unique:users,username',
            'password'      => 'required',
            'email'         => 'required|email',
            'role'          => 'required',
        ]);

        User::create($data);

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Pengguna Baru Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $pengguna)
    {
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $pengguna)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:50',
            'username'      => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($pengguna->id),
            ],
            'password'      => 'nullable',
            'email'         => 'required|email',
            'role'          => 'required',
        ]);

        $pengguna->update($data);

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Data Pengguna Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'Pengguna Berhasil Dihapus.');
    }
}
