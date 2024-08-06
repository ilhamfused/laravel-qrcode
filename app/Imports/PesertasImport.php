<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Peserta([
            'name' => trim(strtoupper($row['name'])),
            'email' => $row['email'],
            'no' => $row['no'],
            'education' => $row['education'],
            'session' => $row['sesi'],
        ]);
    }
}
