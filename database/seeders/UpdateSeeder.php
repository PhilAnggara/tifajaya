<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateSeeder extends Seeder
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
            $i = 0;
            foreach ($item->pengujian as $pengujian) {
                if ($i < 2) {
                    $pengujian->update([
                        'mulai' => Carbon::parse(Carbon::now()),
                        'selesai' => Carbon::parse(Carbon::now()),
                        'status' => 2,
                    ]);
                } else {
                    $pengujian->update([
                        'mulai' => Carbon::parse(Carbon::now()),
                        'status' => 1,
                    ]);
                }
                $i++;
                if ($i > 2) break;
            }
        }
    }
}
