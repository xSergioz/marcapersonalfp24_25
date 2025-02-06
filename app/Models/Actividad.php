<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'id',
        'docente_id',
        'insignia'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reconocimientos', 'actividad_id', 'estudiante_id')->withPivot('documento');
    }
}
