<?php

namespace Database\Seeders;

use App\Models\JenisPengujian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPengujianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPengujian::create([
            'jenis' => 'Agregat',
            'prefix' => 'AGRT',
        ]);
        JenisPengujian::create([
            'jenis' => 'Aspal',
            'prefix' => 'ASPL',
        ]);
        JenisPengujian::create([
            'jenis' => 'Beton',
            'prefix' => 'BTON',
        ]);
    }
}
