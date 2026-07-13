<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggotaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Anggota::all([
            'nomor_anggota',
            'nama',
            'email',
            'kelas',
            'alamat',
            'no_hp'
        ]);
    }

    public function headings(): array
    {
        return [
            'Nomor Anggota',
            'Nama',
            'Email',
            'Kelas',
            'Alamat',
            'No HP',
        ];
    }
}