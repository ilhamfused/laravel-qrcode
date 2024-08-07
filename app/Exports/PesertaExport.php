<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements WithHeadings, FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Peserta::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'nama',
            'email',
            'no. hp',
            'pendidikan',
            'sesi',
            'scan pada',
            'kehadiran',
            'created_at',
            'updated_at',
        ];
    }

    // public function query()
    // {
    //     return Peserta::query();
    // }

}
