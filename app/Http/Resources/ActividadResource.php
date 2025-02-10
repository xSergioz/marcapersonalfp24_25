<?php

namespace App\Http\Resources;

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
        $competencias=$this->competencias;
        $competenciasArray=[];
        foreach($competencias as $competencia){
            $competenciasArray[]=[
                "id"=>$competencia->id,
            ];
        }
        unset($padre['created_at']);
        unset($padre['updated_at']);
        return array_merge(
            $padre,
            ["competencias"=>$competenciasArray],
            ['docente_id' => $this->users],
            ['reconocimientos' => $this->reconocimientos]
        );
    }
}

