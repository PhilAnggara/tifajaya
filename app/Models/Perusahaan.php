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

    public function jenisPengujian()
    {
        return JenisPengujian::where('prefix', Str::substr($this->token, 0, 4))->first();
        
    }

    public function pengujian()
    {
        return $this->hasMany(Pengujian::class, 'id_perusahaan', 'id');
    }

    public function persentase()
    {
        $total = $this->pengujian->count();
        $selesai = $this->pengujian->where('status', 2)->count();
        $result = $selesai / $total * 100;
        return number_format($result, 0);
    }
}
