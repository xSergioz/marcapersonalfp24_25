<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'video_curriculum',
        'texto_curriculum'
    ];
}
