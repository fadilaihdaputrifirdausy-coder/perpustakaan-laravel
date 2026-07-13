<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Buku::all([
            'kode_buku',
            'judul',
            'penulis',
            'penerbit',
            'tahun',
            'stok'
        ]);
    }

    public function headings(): array
    {
        return [
            'Kode Buku',
            'Judul',
            'Penulis',
            'Penerbit',
            'Tahun',
            'Stok',
        ];
    }
}