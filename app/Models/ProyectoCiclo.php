<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosCiclo extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'ciclo_id'
    ];

    public static $filterColumns = ['proyecto_id', 'ciclo_id'];
}
