<?php

namespace Database\Seeders;

use App\Helpers\MyFunction;
use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPengujianSeeder extends Seeder
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
            MyFunction::createDetail($item);
        }
    }
}
