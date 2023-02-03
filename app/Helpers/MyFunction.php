<?php

namespace App\Helpers;

use App\Models\Perusahaan;
use Illuminate\Support\Str;
use App\Models\JenisPengujian;
use App\Models\Pengujian;

class MyFunction
{
    public static function generateToken($id_jenis)
    {
        $jenis = JenisPengujian::find($id_jenis);
        $prefix = $jenis->prefix;
        $perusahaan = Perusahaan::withTrashed()->where('token', 'LIKE', $prefix.'%')->orderBy('id', 'DESC')->first();
        if ($perusahaan) {
            $tail = Str::substr($perusahaan->token, 12) + 1;
            $tail = Str::padLeft($tail, 4, 0);
        } else {
            $tail = '0001';
        }
        
        $token = $prefix.'-'.date('ymd').'-'.$tail;
        return $token;
    }

    public static function createPengujian($item)
    {
        $jenis = $item->jenisPengujian();

        foreach ($jenis->tahapan as $tahap) {
            Pengujian::create([
                'id_perusahaan' => $item->id,
                'id_tahapan_pengujian' => $tahap->id,
            ]);
        }
    }
}
