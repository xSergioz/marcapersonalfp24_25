<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCiclos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'ciclo_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }
}
