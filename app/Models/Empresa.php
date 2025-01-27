<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    
    protected $fillable = [
        'id',
        'nif',
        'nombre',
        'token',
        'user_id',
    ];
}
