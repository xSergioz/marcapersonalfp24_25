<?php

namespace App\Http\Resources;

use App\Models\Competencia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActividadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $padre=parent::toArray($request);
        $competencia=Competencia::find(1);
        foreach($competencia->actividades as $actividad){
            return array_merge(
                $padre,
                $actividad
            );
        }
    }
}
