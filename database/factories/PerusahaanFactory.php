<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perusahaan>
 */
class PerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_perusahaan' => 'PT. IRJA CIPTA PERSADA PEMBANGUNAN',
            'nama_pj' => 'Steven Christopher',
            'jabatan_pj' => 'Direktur Utama',
            'nama_pjsatu' => fake()->name(),
            'jabatan_pjsatu' => 'Kepala Seksi Pembangunan Jalan dan Jembatan',
            'paket' => 'Pembangunan Jalan Akses Jembatan Holtekamp (sisi holtekamp) (myc)',   
            'alamat' => fake()->address(),
            'no_sp' => fake()->regexify('[0-9]{3}/[A-Z]{4}/[A-Z]{2}-[A-Z]{3}-[A-Z]{4}-[A-Z]{4}/III/2022'),
            'telp' => '08'. fake()->randomElement([22, 51, 23, 52]) .fake()->randomNumber(8, true),
            'tgl_sp' => Carbon::parse(Carbon::now()),
            'tgl_daftar' => Carbon::parse(Carbon::now()),
            'satuan_kerja' => fake()->randomElement([
                'PPK 1.2 Provinisi Jayapura',
                'PELAKSANA LAPANGAN ',
                'PPK 1.2 Provinisi Jayapura',
            ]),
            'token' => fake()->randomElement([
                'BTON',
                'ASPL',
                'AGRT',
            ]).fake()->randomNumber(9, true),
        ];
    }
}
