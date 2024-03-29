<?php

namespace App\Helpers;

use App\Models\DetailPengujian;
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
    
    public static function createDetail($item)
    {
        $jenis = $item->jenisPengujian();
        $total = $jenis->itemPengujian()->sum('harga');

        DetailPengujian::create([
            'id_perusahaan' => $item->id,
            'id_jenis_pengujian' => $jenis->id,
            'total_harga' => $total,
            'no_surat' => MyFunction::generateNoSurat(),
            'no_material' => MyFunction::generateNoMaterial(),
        ]);
    }

    public static function generateNoSurat()
    {
        $detail = DetailPengujian::withTrashed()->orderBy('id', 'DESC')->first();
        if ($detail) {
            $count = Str::before($detail->no_surat, '/') + 1;
            $count = Str::padLeft($count, 2, 0);
        } else {
            $count = '01';
        }
        
        $result = $count.'/'.'SPP-Lab.Bb18'.'/'.MyFunction::getRoman(date('m')).'/'.date('Y');
        return $result;
    }
    public static function generateNoMaterial()
    {
        $result = 'Material-Lab.Bb18/'.MyFunction::getRoman(date('m')).'/'.date('Y');
        return $result;
    }

    public static function getRoman($month)
    {
        switch ($month) {
            case 1:
                return 'I';
                break;
            case 2:
                return 'II';
                break;
            case 3:
                return 'III';
                break;
            case 4:
                return 'IV';
                break;
            case 5:
                return 'V';
                break;
            case 6:
                return 'VI';
                break;
            case 7:
                return 'VII';
                break;
            case 8:
                return 'VIII';
                break;
            case 9:
                return 'IX';
                break;
            case 10:
                return 'X';
                break;
            case 11:
                return 'XI';
                break;
            case 12:
                return 'XII';
                break;
        }
    }

    public static function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = MyFunction::penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = MyFunction::penyebut($nilai/10)." puluh". MyFunction::penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . MyFunction::penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = MyFunction::penyebut($nilai/100) . " ratus" . MyFunction::penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . MyFunction::penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = MyFunction::penyebut($nilai/1000) . " ribu" . MyFunction::penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = MyFunction::penyebut($nilai/1000000) . " juta" . MyFunction::penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = MyFunction::penyebut($nilai/1000000000) . " milyar" . MyFunction::penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = MyFunction::penyebut($nilai/1000000000000) . " trilyun" . MyFunction::penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

    public static function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(MyFunction::penyebut($nilai));
		} else {
			$hasil = trim(MyFunction::penyebut($nilai));
		}     		
		return $hasil;
	} 
}
