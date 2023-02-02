<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahapanPengujian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tahapan_pengujian';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];
}
