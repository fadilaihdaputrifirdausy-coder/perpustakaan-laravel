<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username wajib diisi.',
                'password.required' => 'Password wajib diisi.',
            ]
        );

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()
                ->withErrors([
                    'login' => 'Username atau password salah.',
                ])
                ->withInput();
        }

        session([
            'admin_id' => $admin->id,
            'admin_username' => $admin->username,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Login berhasil.');
    }

    // Logout
    public function logout()
    {
        session()->forget([
            'admin_id',
            'admin_username',
        ]);

        return redirect()->route('login')
            ->with('success', 'Berhasil logout.');
    }
}