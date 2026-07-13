<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])->paginate(10);

        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'status' => 'required',
        ],
        [
            'anggota_id.required' => 'Silakan pilih anggota.',
            'buku_id.required' => 'Silakan pilih buku.',
            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tgl_pinjam.date' => 'Tanggal pinjam tidak valid.',
            'tgl_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tgl_kembali.date' => 'Tanggal kembali tidak valid.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
            'status.required' => 'Status peminjaman wajib dipilih.',
        ]);
        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('peminjaman.edit', compact(
            'peminjaman',
            'anggota',
            'buku'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
        [
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'status' => 'required',
        ],
        [
            'anggota_id.required' => 'Silakan pilih anggota.',
            'buku_id.required' => 'Silakan pilih buku.',
            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tgl_pinjam.date' => 'Tanggal pinjam tidak valid.',
            'tgl_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tgl_kembali.date' => 'Tanggal kembali tidak valid.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
            'status.required' => 'Status peminjaman wajib dipilih.',
        ]);
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}