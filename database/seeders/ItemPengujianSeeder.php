<?php

namespace Database\Seeders;

use App\Models\ItemPengujian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemPengujianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Timbunan Biasa / Pilihan',
            'harga' => 1790000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Agregat Kelas A',
            'harga' => 3510000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Agregat Kelas B / S',
            'harga' => 3320000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Agregat Semen Kelas B (CTSB)',
            'harga' => 3620000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Agregat Semen Kelas A (CTB)',
            'harga' => 3810000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Soil Cement',
            'harga' => 8710000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 1,
            'item' => 'Agregat Semen Dengan Material Lokal',
            'harga' => 2260000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 2,
            'item' => 'Aspal HRS Base / HRS WC / AC WC',
            'harga' => 6400000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 2,
            'item' => 'Aspal AC Base / AC Binder (BC)',
            'harga' => 6780000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 2,
            'item' => 'Aspal Latasir',
            'harga' => 5535000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 2,
            'item' => 'Aspal Mcadam',
            'harga' => 2675000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 3,
            'item' => 'Beton Silinder F\'C 30 MPa',
            'harga' => 3915000
        ]);
        ItemPengujian::create([
            'id_jenis_pengujian' => 3,
            'item' => 'Beton Kubus K250',
            'harga' => 3795000
        ]);
    }
}
