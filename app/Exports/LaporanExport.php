<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Peminjaman::with(['anggota', 'buku'])
            ->get()
            ->map(function ($item) {

                return [
                    $item->id,
                    $item->anggota->nama,
                    $item->buku->judul,
                    $item->tgl_pinjam,
                    $item->tgl_kembali,
                    $item->status,
                ];

            });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Anggota',
            'Judul Buku',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status',
        ];
    }
}