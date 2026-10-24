<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('login.login');
    }

    public function loginProses(Request $request)
    {
        $login = $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'kasir') {
                return redirect()->route('kasir.dashboard');
            } else {
                return redirect()->route('kasir.dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau Password Salah.'
        ])->onlyInput('username');
    }

    public function register()
    {
        return view('login.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string',
            'username'      => 'required|string|unique:users,username',
            'password'      => 'required|min:6|confirmed',
            'email'         => 'required|string',
        ]);

        User::create([
            'nama'          => $request->nama,
            'username'      => $request->username,
            'password'      => $request->password,
            'email'         => $request->email,
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Register Berhasil, Silahkan Login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
