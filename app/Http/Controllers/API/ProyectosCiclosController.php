<?php

namespace App\Http\Controllers\API;

use App\Models\Ciclo;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProyectosCiclosController extends Controller
{
    public $modelclass = Proyecto::class;

    public function indexProyectosCiclos($proyectoId)
    {
        $ciclos = DB::table('proyectos_ciclos')
            ->join('ciclos', 'proyectos_ciclos.ciclo_id', '=', 'ciclos.id')
            ->where('proyectos_ciclos.proyecto_id', $proyectoId)
            ->select('ciclos.*')
            ->get();

        return response()->json($ciclos);
    }

    public function indexCiclosProyectos($cicloId)
    {
        $proyectos = DB::table('proyectos_ciclos')
            ->join('proyectos', 'proyectos_ciclos.proyecto_id', '=', 'proyectos.id')
            ->where('proyectos_ciclos.ciclo_id', $cicloId)
            ->select('proyectos.*')
            ->get();

        return response()->json($proyectos);
    }

    public function storeProyectoCiclo(Request $request, $proyectoId)
    {
        $request->validate([
            'ciclo_id' => 'required|exists:ciclos,id'
        ]);

        $cicloId = $request->input('ciclo_id');

        DB::table('proyectos_ciclos')->insert([
            'proyecto_id' => $proyectoId,
            'ciclo_id' => $cicloId
        ]);

        return response()->json(['message' => 'Ciclo attached successfully'], 201);
    }
}
