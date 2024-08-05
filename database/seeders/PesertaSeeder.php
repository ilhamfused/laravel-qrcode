<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peserta = [
            [
                'name' => 'Joni'
            ],
            [
                'name' => 'Mamad'
            ]
        ];

        Peserta::insert($peserta);
    }
}
