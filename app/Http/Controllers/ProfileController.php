<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::find(session('admin_id'));

        return view('profil.index', compact('admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin = Admin::find(session('admin_id'));

        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($admin->foto) {
                Storage::disk('public')->delete($admin->foto);
            }

            // Simpan foto baru
            $path = $request->file('foto')->store('foto-admin', 'public');

            $admin->foto = $path;
        }

        $admin->save();

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function password()
    {
        return view('profil.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'password_lama' => 'required',
                'password_baru' => 'required|min:8|confirmed|different:password_lama',
            ],
            [
                'password_lama.required' => 'Password lama wajib diisi.',
                'password_baru.required' => 'Password baru wajib diisi.',
                'password_baru.min' => 'Password baru minimal 8 karakter.',
                'password_baru.confirmed' => 'Konfirmasi password tidak cocok.',
                'password_baru.different' => 'Password baru tidak boleh sama dengan password lama.',
            ]
        );

        $admin = Admin::find(session('admin_id'));

        if (!Hash::check($request->password_lama, $admin->password)) {

            return back()->withErrors([
                'password_lama' => 'Password lama salah.'
            ]);

        }

        $admin->password = Hash::make($request->password_baru);
        $admin->save();

        return back()->with('success', 'Password berhasil diubah.');
    }
}