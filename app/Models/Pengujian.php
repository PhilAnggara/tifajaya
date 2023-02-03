<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengujian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pengujian';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id');
    }

    public function tahap()
    {
        return $this->belongsTo(TahapanPengujian::class, 'id_tahapan_pengujian', 'id');
    }
}
