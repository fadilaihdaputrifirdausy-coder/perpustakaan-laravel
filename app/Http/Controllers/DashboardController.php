<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = Anggota::count();
        $totalPeminjaman = Peminjaman::count();

        $chartLabels = ['Buku', 'Anggota', 'Peminjaman'];

        $chartData = [
            $totalBuku,
            $totalAnggota,
            $totalPeminjaman
        ];

        $bukuTerbaru = Buku::latest()->take(5)->get();

        $anggotaTerbaru = Anggota::latest()->take(5)->get();

        $peminjamanTerbaru = Peminjaman::with(['anggota','buku'])
                            ->latest()
                            ->take(5)
                            ->get();

        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalPinjamBulanIni = Peminjaman::whereMonth('tgl_pinjam', $bulanIni)
            ->whereYear('tgl_pinjam', $tahunIni)
            ->count();

        $totalKembaliBulanIni = Peminjaman::where('status', 'Dikembalikan')
            ->whereMonth('tgl_kembali', $bulanIni)
            ->whereYear('tgl_kembali', $tahunIni)
            ->count();

        return view('dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'totalPeminjaman',
            'chartLabels',
            'chartData',
            'bukuTerbaru',
            'anggotaTerbaru',
            'peminjamanTerbaru',
            'totalPinjamBulanIni',
            'totalKembaliBulanIni',
        ));
    }
}