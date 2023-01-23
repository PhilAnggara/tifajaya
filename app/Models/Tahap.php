<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tahap extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tahap';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];
}
