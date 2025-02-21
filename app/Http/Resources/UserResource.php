<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $idioma = $this->idiomas->map(function ($idioma) {
            return [
                'alpha2' => $idioma->alpha2,
                'alpha3t' => $idioma->alpha3t,
                'english_name' => $idioma->english_name
            ];
        });

        return array_merge(
            parent::toArray($request),
            ['actividades_estudiante' => $this->actividadesComoEstudiante],
            ['actividades_docente' => $this->actividadesComoDocente],
            ['competencias' => $this->competencias],
            ['curriculo' => $this->curriculo],
            ['ciclos' => $this->ciclos],
            ['proyectos' => $this->proyectos],
            ['idiomas' => $idioma]
        );
    }
}
