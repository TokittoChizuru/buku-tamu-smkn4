<?php

namespace App\Exports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tamu::all([
            'id',
            'nama_lengkap',
            'asal_tamu',
            'menemui',
            'alasan',
            'foto_tamu',
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'INstansi',
            'Menemui',
            'Alasan',
            'Foto Tamu',
        ];
    }
}
