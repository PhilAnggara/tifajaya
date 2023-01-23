<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemporaryData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'temporary_data';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [

    ];
}
