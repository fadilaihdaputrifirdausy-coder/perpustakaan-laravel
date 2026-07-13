<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with(['anggota', 'buku']);

        if ($request->tgl_awal && $request->tgl_akhir) {

            $query->whereBetween('tgl_pinjam', [
                $request->tgl_awal,
                $request->tgl_akhir
            ]);

        }

        $laporan = $query->get();

        return view('laporan.index', compact('laporan'));
    }
    public function exportExcel()
    {
        return Excel::download(new LaporanExport, 'laporan_peminjaman.xlsx');
    }

    public function exportPdf()
    {
        $laporan = Peminjaman::with(['anggota', 'buku'])->get();

        $pdf = Pdf::loadView('laporan.pdf', compact('laporan'));

        return $pdf->download('laporan_peminjaman.pdf');
    }
}