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

    public static $filterColumns = ['estudiante_id', 'actividad_id', 'documento', 'docente_validador'];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }

    public function docente()
    {
        return $this->belongsTo(User::class, 'docente_validador');
    }
}
