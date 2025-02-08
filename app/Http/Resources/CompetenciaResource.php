<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetenciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $padre=parent::toArray($request);
        $actividades=$this->actividades;
        $actividadesArray=[];
        foreach($actividades as $actividad){
            $actividadesArray[]=[
                "id"=>$actividad->id,
            ];
        }
        unset($padre['created_at']);
        unset($padre['updated_at']);
        return array_merge(
             $padre,[
             "actividades"=>$actividadesArray]
        );
    }
}
