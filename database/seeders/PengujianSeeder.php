<?php

namespace Database\Seeders;

use App\Models\JenisPengujian;
use App\Models\Pengujian;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengujianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Perusahaan::all();

        foreach ($items as $item) {
            $jenis = JenisPengujian::where('prefix', Str::substr($item->token, 0, 4))->first();
            $id_perusahaan = $item->id;
            $tahapan = $jenis->tahapan;

            foreach ($tahapan as $tahap) {
                Pengujian::create([
                    'id_perusahaan' => $id_perusahaan,
                    'id_tahapan_pengujian' => $tahap->id,
                ]);
            }
        }
    }
}
