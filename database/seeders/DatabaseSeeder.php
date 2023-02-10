<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PerusahaanSeeder::class,
            JenisPengujianSeeder::class,
            TahapanPengujianSeeder::class,
            PengujianSeeder::class,
            ItemPengujianSeeder::class,
            DetailPengujianSeeder::class,
            PertanyaanSeeder::class,
            UpdateSeeder::class,
        ]);
    }
}
