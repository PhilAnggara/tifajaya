<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahapPengujian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tahap_pengujian';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];
}
