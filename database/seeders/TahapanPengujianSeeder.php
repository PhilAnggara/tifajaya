<?php

namespace Database\Seeders;

use App\Models\TahapanPengujian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahapanPengujianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahapanPengujian::create([
            'id_jenis_pengujian' => 1,
            'tahapan' => 'Properties Material URBIS - URPIL, KLS A,B,S',
            'waktu' => '4 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 1,
            'tahapan' => 'Properties Material CTB-CTSB',
            'waktu' => '4 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 1,
            'tahapan' => 'Properties Material SOIL - Alam Lokal',
            'waktu' => '4 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 1,
            'tahapan' => 'Compacting & Loading CBR URBIS - URPIL, KLS A,B,S',
            'waktu' => '4 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 1,
            'tahapan' => 'Compacting & UCS CTSB - CTB',
            'waktu' => '7 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 1,
            'tahapan' => 'Compacting & UCS SOIL - Alam Lokal',
            'waktu' => '10 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 2,
            'tahapan' => 'Properties Aspal',
            'waktu' => '7 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 2,
            'tahapan' => 'Properties Material',
            'waktu' => '10 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 2,
            'tahapan' => 'Compacting & Uji Marshall',
            'waktu' => '2 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 3,
            'tahapan' => 'Properties Material',
            'waktu' => '7 Hari Kerja',
        ]);
        TahapanPengujian::create([
            'id_jenis_pengujian' => 3,
            'tahapan' => 'Perencanaan Camputan Beton & Uji Tekan',
            'waktu' => '28 + 7 Hari Kalender',
        ]);
    }
}
