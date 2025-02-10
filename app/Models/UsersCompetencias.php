<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCompetencias extends Model
{
    use HasFactory;

    protected $table = 'users_competencias';

    protected $fillable = [
        'user_id',
        'competencia_id',
        'docente_validador'
    ];

    public static $filterColumns = [
        'user_id', 'competencia_id', 'docente_validador'
    ];
}
