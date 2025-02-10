<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProyectoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        unset($data['ciclo_id']);

        return array_merge(
            $data,
            ['ciclos' => $this->ciclos],
            [ 'participantes' => $this->participantes]
        );
    }
}
