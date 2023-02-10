<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'perusahaan';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];


    public function pengujian()
    {
        return $this->hasMany(Pengujian::class, 'id_perusahaan', 'id');
    }

    public function detail()
    {
        return $this->hasOne(DetailPengujian::class, 'id_perusahaan', 'id');
    }

    public function jenisPengujian()
    {
        return JenisPengujian::where('prefix', Str::substr($this->token, 0, 4))->first();
    }

    public function progress()
    {
        $total = $this->pengujian->count();
        $selesai = $this->pengujian->where('status', 2)->count();
        $result = $selesai / $total * 100;
        return number_format($result, 0);
    }

    public function response()
    {
        return $this->hasOne(Responden::class, 'id_perusahaan', 'id');
    }
}
