<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.akun.index', compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.akun.editProfile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:50',
            'username'      => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id)
            ],
            'email'         => 'required|email',
        ]);

        $user->update($data);

        return redirect()
            ->route('akun.index')
            ->with('success', 'Profile Berhasil Diperbarui.');
    }

    public function editPassword(User $user)
    {
        return view('admin.akun.editPassword', compact('user'));
    }

    public function ubahPasswordProses(Request $request, User $user)
    {
        $request->validate([
            'password_lama' => 'required|string',
            'password_baru' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                'different:password_lama',
            ],
        ], [
            'password_lama.required'  => 'Password lama wajib diisi.',
            'password_baru.required'  => 'Password baru wajib diisi.',
            'password_baru.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password_baru.different' => 'Password baru harus berbeda dari password lama.',
        ]);

        // Memeriksa password lama
        if (! Hash::check($request->password_lama, $user->password)) {
            return back()
                ->withErrors([
                    'password_lama' => 'Password lama yang kamu masukkan salah.',
                ])
                ->withInput($request->except([
                    'password_lama',
                    'password_baru',
                    'password_baru_confirmation',
                ]));
        }

        // Menyimpan password baru
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return redirect()
            ->route('akun.index')
            ->with('success', 'Password berhasil diperbarui.');
    }
}
