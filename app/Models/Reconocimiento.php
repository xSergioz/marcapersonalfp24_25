<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reconocimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'estudiante_id',
        'actividad_id',
        'documento',
        'docente_validador'
    ];
    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class);
    }
}
