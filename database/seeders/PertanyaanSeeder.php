<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertanyaan::create([
            'text' => 'Kesesuaian Persyaratan Pelayanan dengan Jenis Pelayanan',
            'a' => 'Tidak Sesuai',
            'b' => 'Kurang Sesuai',
            'c' => 'Sesuai',
            'd' => 'Sangat Sesuai',
        ]);
        Pertanyaan::create([
            'text' => 'Kemudahan Prosedur Pengajuan Permohonan Pengujian',
            'a' => 'Tidak Mudah',
            'b' => 'Kurang Mudah',
            'c' => 'Mudah',
            'd' => 'Sangat Mudah',
        ]);
        Pertanyaan::create([
            'text' => 'Waktu Penyelesaian Pengujian Hingga Laporan Diterima Pelanggan',
            'a' => 'Terlalu Lama',
            'b' => 'Cukup Lama',
            'c' => 'Cepat',
            'd' => 'Sangat Cepat',
        ]);
        Pertanyaan::create([
            'text' => 'Tarif Jasa Pengujian',
            'a' => 'Sangat Mahal',
            'b' => 'Cukup Mahal',
            'c' => 'Murah',
            'd' => 'Sangat Murah',
        ]);
        Pertanyaan::create([
            'text' => 'Kualitas Produk Sesuai Standar Yang Telah Ditetapkan',
            'a' => 'Tidak Sesuai',
            'b' => 'Kurang Sesuai',
            'c' => 'Sesuai',
            'd' => 'Sangat Sesuai',
        ]);
        Pertanyaan::create([
            'text' => 'Kompetensi Petugas Pelayanan',
            'a' => 'Tidak Kompeten',
            'b' => 'Kurang Kompeten',
            'c' => 'Kompeten',
            'd' => 'Sangat Kompeten',
        ]);
        Pertanyaan::create([
            'text' => 'Perilaku Petugas Dalam Memberikan Pelayanan',
            'a' => 'Buruk',
            'b' => 'Cukup',
            'c' => 'Baik',
            'd' => 'Sangat Baik',
        ]);
        Pertanyaan::create([
            'text' => 'Kondisi Peralatan & Laboratorium',
            'a' => 'Buruk',
            'b' => 'Cukup',
            'c' => 'Baik',
            'd' => 'Sangat Baik',
        ]);
        Pertanyaan::create([
            'text' => 'Penanganan Pengaduan, Saran, Dan Masukan',
            'a' => 'Tidak Ada',
            'b' => 'Ada Tapi Tidak Berfungsi',
            'c' => 'Berfungsi Tapi Kurang Maksimal',
            'd' => 'Dikelola Dengan Baik',
        ]);
    }
}
