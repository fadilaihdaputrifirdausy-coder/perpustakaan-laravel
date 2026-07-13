<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Proses login
    public function authenticate(Request $request)
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
                    'login' => 'Username atau Password salah.'
                ])
                ->withInput();
        }

        session([
            'admin_login' => true,
            'admin_id' => $admin->id,
            'admin_username' => $admin->username,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Login berhasil.');
    }

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }
}